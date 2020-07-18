<?php

namespace App\Utils;

use AfricasTalking\SDK\AfricasTalking;
use Illuminate\Support\Facades\Log;

class SMS
{
    public static function sendSMS($to, $message, $from = null)
    {
        $username = env('AT_USERNAME');
        $apiKey = env('AT_API_KEY');
        // $senderId = env('AT_SENDER_ID');
        $AT = new AfricasTalking($username, $apiKey);

        // Get one of the services
        $sms = $AT->sms();

        // Use the service
        $result = $sms->send([
            'to'      => $to,
            'message' => $message,
            // 'from' => $from || $senderId
        ]);
        Log::info($result);

        return $result;
    }
}