<?php

namespace App\Utils;

use AfricasTalking\SDK\AfricasTalking;

class SMS
{
    public static function sendSMS($to, $message, $from)
    {
        $username = env('AT_USERNAME');
        $apiKey = env('AT_API_KEY');
        $senderId = env('AT_SENDERID');
        $AT = new AfricasTalking($username, $apiKey);

        // Get one of the services
        $sms = $AT->sms();

        // Use the service
        $result = $sms->send([
            'to'      => $to,
            'message' => $message,
            'from' => $from || $senderId
        ]);

        return $result;
    }
}