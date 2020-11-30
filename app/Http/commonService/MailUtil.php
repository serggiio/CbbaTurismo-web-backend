<?php

class MailUtill extends Mailable
{
    use Queueable, SerializesModels;

    public $distressCall;

    public function __construct()
    {
     //   
    }

    public function sendMail($receiver)
    {
        Mail::to($receiver)->send("HOLAS BOLAS");
    }
}