<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvitationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userEmail, $userPassword = null)
    {
        $this->email = $userEmail;
        $this->password = $userPassword;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject("Invitación Cochabamba turística ")
            ->html("<p>Fuiste invitado como agente para gestionar lugares turisticos.  <br>    
                    Usa las siguientes credenciales para poder iniciar sesión. <br>
                        Usuario: <strong>" . $this->email . " </strong> <br>
                        Contraseña: <strong>" . $this->password . " </strong><p>");
    }
}
