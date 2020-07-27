<?php

namespace App\Utils;

class SMS
{
    public static function sendSMS($to, $message)
    {
        $metech_url = "https://ke.mtechcomm.com/bulkAPIV2/?user=Henry&pass=c74ef0b6b0cfbb3779ce3bb1145a94db0e784f77&shortCode=INSURELY&MSISDN=". $to ."&MESSAGE=". $message;

        $client = new \GuzzleHttp\Client(['verify' => false ]);
        $response = $client->get($metech_url);
        return $response;
    }
}