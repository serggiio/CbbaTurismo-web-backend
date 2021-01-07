<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TouristicPlace as TouristicObj;

class MainController extends Controller
{
    public function index(){

        $touristicData = TouristicObj::select('placeName', 'touristicPlaceId', 'description', 'mainImage')->where('placeStatusId', '=', 2)->get();

        $lugares_turisticos = [
            'Punata',
            'Sacaba',
            'Cercado',
            'Tquipaya',
            'Tarata',
            '<script>alert("Clicker")</script>'
        ];

        //dd($touristicData->toArray());
        //dd($lugares_turisticos);

        return view('welcome', [
            'lugares' => $touristicData
        ]);

    }
}
