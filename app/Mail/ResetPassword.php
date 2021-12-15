<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    private $newPassword;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($code)
    {
        $this->newPassword = $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject("Reinicio de contraseña: ")
        ->html("<p>Se reinicio tu contraseña, usa la siguiente clave para ingresar : <strong> " . $this->newPassword . " </strong>
            <br>Recomendamos que cambies tu contraseña cuando inicies sesión<p>");
    }
}
