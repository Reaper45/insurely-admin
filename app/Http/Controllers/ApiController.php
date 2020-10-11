<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Category;
use App\Http\Controllers\Traits\ControllerHelpers;
use App\InsuranceClass;
use App\Mail\Payment;
use App\MFADetails;
use App\Utils\SMS;
use Illuminate\Support\Facades\Log;
use App\Mail\Quote;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use App\Exports\OrderExport;
use App\Mail\Order;
use App\Mail\Test;
use Maatwebsite\Excel\Facades\Excel;

class ApiController extends Controller
{
    // Adds helper methods to the controller
    use ControllerHelpers;

    private $OTP_EXP_IN = 90;

    private function sumTariffs($tariffs, $sumInsured)
    {
        $total = 0;
        foreach($tariffs as $tariff) {
            // Check if active
            if ($tariff->is_active) {
                // is percentage
                if ($tariff->is_percentage) {
                    $total += ceil($sumInsured * ($tariff->value / 100));
                    break;
                } else
                $total += $tariff->value;
                break;
            }   
            $total += $tariff->value;
        }
        return $total;
    }

    private function generateSMSOTP($length = 4)
    {
        $allowedChars = '0123456789';
        $otp = '';
        for ($index = 0; $index < $length; ++$index) {
            $charIndex = rand(0, Str::length($allowedChars) - 1);
            $otp = $otp . $allowedChars[$charIndex];
        }
        return $otp;
    }

    private function sumCharges($charges, $sumInsured)
    {
        return $this->sumTariffs($charges, $sumInsured);
    }

    public function calculateQuote(Request $request)
    {
        $categoryId = $request->input('categoryId');
        $sumInsured = $request->input('sumInsured');
        
        // Fetch products under category
        $products = Category::find($categoryId)->products;

        // Calculate price for each product
        if($products->count() !== 0){
            $quoteArr = [];
            foreach($products as $product) {
                $product_tariffs = $product->tariffs;
                $product_charges = $product->charges;

                // $product_benefits = $product->benefits;
                $benefits_charges = [];
                $benefits_tariffs = [];

                // Includes 000 (class) products
                $optional_benefits_class = InsuranceClass::where("value", env("EXTRAS", "000"))->first();
                $optional_benefits       = $optional_benefits_class->products->load('tariffs');

                foreach($product->benefits as $product_benefit) {
                    $product_benefit->with('tariffs');
                    if(!$product_benefit->is_optional) {
                        array_push($benefits_charges, ...$product_benefit->charges);
                        array_push($benefits_tariffs, ...$product_benefit->tariffs);
                    }
                }

                // Tariff totals
                $product_tariffs_totals = $this->sumTariffs($product_tariffs, $sumInsured);

                // Charge totals
                $charges = [];
                foreach($product_charges as $product_charge) {
                    array_push($charges, [
                        "id"    => $product_charge->id,
                        "name"  => $product_charge->name,
                        "value" => $product_charge->is_percentage ? ceil(($product_charge->value / 100) * $sumInsured) : $product_charge->value
                    ]);
                }

                array_push($quoteArr, [
                    'premium'           => $product_tariffs_totals,
                    'charges'           => $charges,
                    'sum_insured'       => $sumInsured,
                    "product_id"        => $product->id,
                    "name"              => $product->name,
                    "insurer"           => $product->insurer,
                    "benefits"          => $product->benefits->load('tariffs'),
                    "optional_benefits" => $optional_benefits,
                    "has_ipf"           => $product->has_ipf,
                ]);
            }

            return response($this->api_response(true, ["quotes" => $quoteArr], null), 200);
        }
        return response($this->api_response(true, null, "No products were found"), 200);
    }
    
    /**
     * Send payment confirmation email to customer & order details (.xsls) to Insurely
     */
    public function sendPaymentEmail(Request $request)
    {
        $customer       = $request->input('customer');
        $transaction_id = $request->input('transaction_id');
        $quote          = $request->input('quote');

        $payment = DB::table("transactions")->find($transaction_id);

        // Send payment confirmation email to customer
        Mail::to($customer["email"])->queue(new Payment($payment, (array)$quote, $customer));

        // Send the order details to insurely admin
        $file_name = $customer["name"].'.xlsx';
        $file = Excel::download(new OrderExport($customer, $payment, $quote),  $file_name)->getFile(); 

        $order_message = new Order($quote, $customer["name"],  $customer["email"]);
        $order_message->attach($file, [
            "as"   => $file_name,
            "mime" => "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
        ]);

        Mail::to(env('ORDERS_EMAIL'))->send($order_message);
        
        return response($this->api_response(true, null, "Request completed"), 200);
    }

    /**
     * Send quote to customer with pdf attachment 
     */
    public function sendQuoteEmail(Request $request)
    {
        $quote   = $request->input('quote');
        $to      = $request->input('to');
        $pdf     = PDF::loadView('exports.quote', $quote)->setPaper('a4');
        $message = new Quote($quote);

        $message->attachData($pdf->output(), $quote["name"].'.pdf', [
            "mime" => "application/pdf"
        ]);

        Mail::to($to)->send($message);            
        
        return response($this->api_response(true, null, "Request completed"), 200);
    }

    public function sendOtp(Request $request)
    {
        $phoneNumber = $request->input('phoneNumber');

        // Generate token
        $otp = $this->generateSMSOTP();

        // Write token to DB
        $mfa_details               = new MFADetails;
        $mfa_details->secret       = $otp;
        $mfa_details->phone_number = $phoneNumber;
        $mfa_details->expires_in   = date("m/d/Y h:i:s a", time() + $this->OTP_EXP_IN);
        
        $mfa_details->save();

        $message = "${otp} is Insurely verification code.";

        // Send out token
        SMS::sendSMS($phoneNumber, $message);

        return response($this->api_response(true, null, 'Success'), 200);
    }

    public function verifyOTP(Request $request)
    {
        $phoneNumber = $request->input('phoneNumber');
        $code        = $request->input('code');
        $mfa         = MFADetails::where('phone_number', $phoneNumber)->where('secret', $code)->first();

        if($mfa) {
            $has_expired = date("Y-m-d H:i:s") > $mfa->expires_in;
            if($has_expired) {
                return response($this->api_response(false, ['verified' => false], 'OTP code has expired'), 200);
            }
            return response($this->api_response(true, ['verified' => true], "Verification successful"), 200);
        }
        return response($this->api_response(false, ['verified' => false], 'Failed verification'), 200);
    }

    public function getClasses()
    {
        $classes = InsuranceClass::all();
        return response($this->api_response(true, ["classes" => $classes], null), 200);
    }

    public function getClass($class_id)
    {
        $class = InsuranceClass::find($class_id);
        return response($this->api_response(true, ["class" => $class->load('parent', 'children')], null), 200);
    }

    public function getSubClasses($class_id)
    {
        $class = InsuranceClass::find($class_id)->load('children');
        return response($this->api_response(true, ["sub_classes" => $class->children], null), 200);
    }

    public function getCategories($class_id)
    {
        // Return categories including REC, MED & SEC
        // $class_id -> for later use
        $categories = Category::all();
        return response($this->api_response(true, ["categories" => $categories], null), 200);
    }

    public function mpesaCallback(Request $request)
    {
        $body = $request->input('Body');
        $stkCallback = $body["stkCallback"];

        if(array_key_exists("CallbackMetadata", $stkCallback)){
            $metaData = $stkCallback["CallbackMetadata"]["Item"];
            $transaction = [
                "description"         => $stkCallback["ResultDesc"],
                "merchant_request_id" => $stkCallback["MerchantRequestID"],
                "checkout_request_id" => $stkCallback["CheckoutRequestID"],
                "result_code"         => $stkCallback["ResultCode"],
            ];

            foreach($metaData as $item) {
                if($item["Name"] == "Amount") {
                    $transaction["amount"] = $item["Value"];
                }
                elseif($item["Name"] == "PhoneNumber") {
                    $transaction["phone_number"] = $item["Value"];
                }
                elseif($item["Name"] == "MpesaReceiptNumber") {
                    $transaction["mpesa_code"] = $item["Value"];
                }
                elseif($item["Name"] == "TransactionDate") {
                    $transaction["transaction_time"] = $item["Value"];
                }
            }
            DB::table("transactions")->insert($transaction);
        }
        return response(200);
    }

    public function checkTransaction(Request $request)
    {
        $amount       = $request->input('amount');
        $phone_number = $request->input('phone_number');

        $transaction = DB::table("transactions")->where("phone_number", $phone_number)->where("amount", $amount)->first();
        
        $message = $transaction ? "Payment received" : "Payment not yet received";

        return response($this->api_response((bool)$transaction, ["received" => (bool)$transaction, "transaction" => $transaction], $message), 200);
    }
}
