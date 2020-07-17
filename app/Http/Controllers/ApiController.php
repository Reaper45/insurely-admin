<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Category;
use App\User;
use App\MFADetails;
use App\Utils\SMS;

class ApiController extends Controller
{

    private function sumTariffs($tariffs, $sumInsured)
    {
        $total = 0;
        foreach($tariffs as $tariff) {
            // Check if active
            if ($tariff->is_active) {
                // is percentage
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

            $quoteArr.push(array('productTotals' => $product_totals, 'benefitsTotals' => $benefits_totals, 'sumInsured' => $sumInsured));
        }

        return response()->json($quoteArr);
        
    }
    
    public function sendEmail()
    {

    }

    public function sendOtp(Request $request)
    {
        $userId = $request->input('userId');

        // Check if user is valid
        $user = User::find(int($userId));

        if ($user) {

            // Generate token
            $otp = $this->generateSMSOTP();

            // Write token to DB
            $mfa_details = new MFADetails([
                'secret' => $otp,
                'expires_in' => date("m/d/Y h:i:s a", time() + 90),
            ]);

            $message = "Hey {$user->name}, your OTP is ${otp}";

            // Send out token
            SMS::sendSMS($user->phoneNumber, $message);

            return response()->json(['message' => 'Success'], 200);
        }
        return response()->json(['message' => 'Invalid User'], 400);
    }

}
