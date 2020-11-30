<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $lugares_turisticos = [
            'Punata',
            'Sacaba',
            'Cercado',
            'Tquipaya',
            'Tarata',
            '<script>alert("Clicker")</script>'
        ];

        //dd($lugares_turisticos);

        return view('welcome', [
            'lugares' => $lugares_turisticos
        ]);

    }
}
