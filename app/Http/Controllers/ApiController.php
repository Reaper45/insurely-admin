<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Category;
use App\Http\Controllers\Traits\ControllerHelpers;
use App\InsuranceClass;
use App\User;
use App\MFADetails;
use App\Utils\SMS;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
    // Adds helper methods to the controller
    use ControllerHelpers;

    private function sumTariffs($tariffs, $sumInsured)
    {
        $total = 0;
        foreach($tariffs as $tariff) {
            // Check if active
            if ($tariff->is_active) {
                // is percentage
                if ($tariff->is_percentage) {
                    $total += ($sumInsured * (1 + $tariff->value));
                }
                $total += $sumInsured * $tariff->value;
            }   
            $total += $tariff->value;
        }
        return $total;
    }

    private function generateSMSOTP($length = 6)
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
        // ID category
        $categoryId = $request->input('categoryId');
        // Sum Insured
        $sumInsured = $request->input('sumInsured');
        
        // Fetch products under category
        $products = Category::find($categoryId)->products;

        // Calculate price for each product
        $quoteArr = [];
        foreach($products as $product) {
            $product_tariffs = $product->tariff;
            $product_charges = $product->charges;
            $benefits_charges = $product->benefits->charges;
            $benefits_tariffs = $product->benefits->tariffs;

            // Tariff totals
            $product_tariffs_totals = $this->sumTariffs($product_tariffs, $sumInsured);
            $benefits_tariffs_totals = $this->sumTariffs($benefits_tariffs, $sumInsured);

            // Charge totals
            $product_charges_totals = $this->sumTariffs($product_charges, $sumInsured);
            $benefits_charges_totals = $this->sumTariffs($benefits_charges, $sumInsured);
            
            // Product & Benefit totals
            $product_totals = $product_tariffs_totals + $product_charges_totals;
            $benefits_totals = $benefits_tariffs_totals + $benefits_charges_totals;

            $quoteArr[array('productTotals' => $product_totals, 'benefitsTotals' => $benefits_totals, 'sumInsured' => $sumInsured)];
        }

        return response()->json();
        return response($this->api_response(true, $quoteArr, null), 200);
    }
    
    public function sendEmail()
    {

    }

    public function sendOtp(Request $request)
    {
        $phoneNumber = $request->input('phoneNumber');

        // Generate token
        $otp = $this->generateSMSOTP();

        // Write token to DB
        $mfa_details = new MFADetails;
        $mfa_details->secret = $otp;
        // $mfa_details->mfa_type = "";
        $mfa_details->phone_number = $phoneNumber;
        $mfa_details->expires_in = date("m/d/Y h:i:s a", time() + 90);
        
        $mfa_details->save();

        $message = "Hey, your OTP is ${otp}";

        // Send out token
        SMS::sendSMS($phoneNumber, $message);

        return response($this->api_response(true, null, 'Success'), 200);
        // return response()->json(['message' => 'Invalid User'], 400);
    }

    public function verifyOTP(Request $request)
    {
        $phoneNumber = $request->input('phoneNumber');
        $code = $request->input('code');
        
        $mfa = MFADetails::where('phone_number', $phoneNumber)->where('secret', $code)->first();
        Log::info($mfa);

        if($mfa) {
            return response($this->api_response(true, ['verified' => true], "Verification successful"), 200);
        }
        return response($this->api_response(false, ['verified' => false], 'Failed verification'), 200);
    }

    // All classes
    public function getClasses()
    {
        $classes = InsuranceClass::all();
        return response($this->api_response(true, $classes, null), 200);
    }

    // Class by id
    public function getClass($class_id)
    {
        $class = InsuranceClass::find($class_id);
        return response($this->api_response(true, $class->load('categories'), null), 200);
    }

    // Class categories
    public function getCategories($class_id)
    {
        $categories = Category::where("insurance_class_id", $class_id)->get();
        return response($this->api_response(true, $categories, null), 200);
    }
}
