<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($action, $email, $password = null)
    {
        $this->action = $action;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->action == 'approve') {
            $subject = 'Solicitud Aprobada!';
            $body = "<p>Tu solicitud de integracion al sistema turístico fue aprobada.  <br>    
                    Utiliza los siguientes datos para ingresar al sistema. <br>
                    Usuario: <strong>" . $this->email . " </strong> <br>
                    Contraseña: <strong>" . $this->password . " </strong><br> 
                    Recuerda que la cuenta acaba de ser aprobada, por lo que es
                    necesario actualizar la siguiente informacion: 
                    <ul>
                        <li>Informacion de contacto(Nombre, apellido, etc.)</li>
                        <li>Informacion turística (tags, categorías historia, etc.)</li>
                        <li>Ubicación en el mapa</li>
                        <li>Estados de lugares turísticos</li>
                    </ul><p>";
        }else{
            $subject = 'Solicitud Rechazada';
            $body = "<p>Tu solicitud de integracion al sistema turístico fue rechazada.  <br><p>";
        }

        return $this
        ->subject($subject)
        ->html($body);
    }
}
