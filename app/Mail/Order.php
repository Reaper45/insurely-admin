<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Order extends Mailable
{
    use Queueable, SerializesModels;

    public $customer_name;

    public $customer_email;

    public $quote;
    /**
     * Create a new message instance.
     * 
     * @param object $quote
     * @param string $customer_name
     * @param string $customer_email
     * 
     * @return void
     */
    public function __construct($quote, $customer_name, $customer_email)
    {
        $this->quote = $quote;
        $this->customer_name = $customer_name;
        $this->customer_email = $customer_email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->customer_email, $this->customer_name)
                    ->subject("New policy - ".$this->customer_name)
                    ->view('emails.order')
                    ->with(['quote' => $this->quote, "customer_name" => $this->customer_name]);
    }
}
