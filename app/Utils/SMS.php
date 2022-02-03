<?php

namespace App\Utils;

use AfricasTalking\SDK\AfricasTalking;

class SMS
{
    public static function sendSMS($to, $message)
    {
        $AT  = new AfricasTalking(env("AT_USERNAME"), env("AT_API_KEY"));
        $sms = $AT->sms();

        $sms->send([
            'to'      => $to,
            'message' => $message
        ]);
    }
}