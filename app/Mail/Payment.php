<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Payment extends Mailable
{
    use Queueable, SerializesModels;

    public $payment_details;

    public $quote;

    public $customer_name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($payment_details, $quote, $customer_name)
    {
        $this->payment_details = $payment_details;
        $this->quote = $quote;
        $this->customer_name = $customer_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("recieved@insurely.cc", "Insurely ltd. ")
                    ->subject("Payment Received")
                    ->view("emails.payment")->with([
                        "payment" => $this->payment_details,
                        "quote" => $this->quote,
                        "name" => $this->customer_name
                    ]);
    }
}
