<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Quote extends Mailable
{
    use Queueable, SerializesModels;

    public $quote;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($quote)
    {
        $this->quote = $quote;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from("noreply@insurely.cc", "Insurely ltd. ")
                    ->subject($this->quote["name"])
                    ->view('emails.quote')
                    ->with(['quote' => $this->quote]);
    }
}
