<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AgentResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($code, $url, $action)
    {
        $this->newCode = $code;
        $this->path = $url;
        $this->action = "/" . $action . "/";
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
        ->html("<p>Reinicio de contraseña, usa el siguiente enlace: <strong> " . $this->path . $this->action . $this->newCode . " </strong>
            <br>Recomendamos <br>
                <ul>
                    <li>No compartir el elance</li>
                    <li>Crear una constraseña con mas de 5 caracteres</li>
                    <li>Esta url solo puede ser usada una vez</li>
                </ul>
            <p>");
    }
}
