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

    public $customer;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($payment_details, $quote, $customer)
    {
        $this->payment_details = $payment_details;
        $this->quote = $quote;
        $this->customer= $customer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env("MAIL_FROM_ADDRESS"), env("MAIL_FROM_NAME"))
                    ->subject($this->payment_details->mpesa_code." - Payment Received")
                    ->view("emails.payment")->with([
                        "payment" => $this->payment_details,
                        "quote" => $this->quote,
                        "name" => $this->customer["name"]
                    ]);
    }
}
