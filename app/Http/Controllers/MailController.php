<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Mailable
{
    public function sendMail($receiver)
    {
        Mail::to($receiver)->send("TEST MAIL 000158");
    }
}
