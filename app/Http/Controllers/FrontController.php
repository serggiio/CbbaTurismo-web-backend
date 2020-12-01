<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TouristicPlace as TouristicObj;
use App\Images as ImagesObj;
use App\Tag as TagObj;
use App\Province as ProvinceObj;
use App\Favorite as FavObj;
use App\Rate as RateObj;

class FrontController extends Controller
{
    public function index()
    {
        $touristicPlaces = TouristicObj::orderBy('created_at', 'desc')->get();

        $touristicPlaces->each(function($touristicPlace){
            $touristicPlace['provinceName'] = $touristicPlace->province['provinceName'];
            $touristicPlace['statusName'] = $touristicPlace->status['statusName'];

            unset($touristicPlace['province']);
            unset($touristicPlace['status']);

        });

        //dd($touristicPlaces->toArray());
        return view('admin.admin')
        ->with('places', $touristicPlaces);

    }

    public function registerNewPlace()
    {
        $tags = TagObj::orderBy('tagName', 'desc')->get();
        $provinces = ProvinceObj::orderBy('provinceName', 'desc')->get();
        //dd($provinces[0]['provinceName']);
        return view('admin.places.registerPlace')
        ->with('tags', $tags)
        ->with('provinces', $provinces);

    }

    
}
