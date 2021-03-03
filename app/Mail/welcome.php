<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class welcome extends Mailable
{
    use Queueable, SerializesModels;

    private $verificationCode;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($code)
    {
        $this->verificationCode = $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject("Codigo de verificación: ")
            ->html("<p>Gracias por registrarte, usa el siguiente codigo de verificación : <strong> " . $this->verificationCode . " </strong><p>");
    }
}
