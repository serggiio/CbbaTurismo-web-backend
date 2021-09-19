<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TouristicPlace as TouristicObj;
use App\Images as ImageObj;
use App\Tag as TagObj;

class MainController extends Controller
{
    public function index(){

        $touristicData = TouristicObj::select('placeName', 'touristicPlaceId', 'description', 'mainImage', 'streets')->where('placeStatusId', '=', 2)->get();
        $tags = TagObj::orderBy('tagName', 'desc')->get();
        $imagesData = ImageObj::orderBy('created_at', 'desc')->get();

        foreach ($imagesData as $key => $data) {
            $data->gallery;
        }
        //dd($imagesData->toArray());

        //dd($touristicData->toArray());
        //dd($lugares_turisticos);

        return view('welcome', [
            'places' => $touristicData,
            'images' => $imagesData->slice(0, 30),
            'tags' => $tags
        ]);

    }

    public function previewList()
    {   
        $touristicPlaces = TouristicObj::orderBy('placeName', 'desc')->where('placeStatusId', '=', 2)->get();
        $tags = TagObj::orderBy('tagName', 'desc')->get();
        $touristicPlaces->each(function($touristicPlace){
            $touristicPlace['provinceName'] = $touristicPlace->province['provinceName'];
            $touristicPlace['statusName'] = $touristicPlace->status['statusName'];
            $touristicPlace['rateAvg'] = round($touristicPlace->rate->avg('puntuacion'));
            $touristicPlace['galleryCount'] = $touristicPlace->gallery->count();
            unset($touristicPlace['province']);
            unset($touristicPlace['status']);

        });

        return view('template.previewPlaces', [
            'places' => $touristicPlaces,
            'tags' => $tags
        ]);
    }

    public function previewDetail($id)
    {   
        $touristicPlace = TouristicObj::where('touristicPlaceId', '=', $id)->first();
        $tags = TagObj::orderBy('tagName', 'desc')->get();
        $touristicPlace['provinceName'] = $touristicPlace->province['provinceName'];
        $touristicPlace['statusName'] = $touristicPlace->status['statusName'];
        $touristicPlace['rateAvg'] = round($touristicPlace->rate->avg('puntuacion'));
        $touristicPlace->gallery;
        $touristicPlace->commentary;

        foreach ($touristicPlace['gallery'] as $gallery) {
            $gallery->images;
        }

        $touristicPlace->commentary->each(function($commentaryData){
            $commentaryData->user;            
        });

        //dd($touristicPlace->toArray());
        return view('template.previewDetail', [
            'place' => $touristicPlace,
            'tags' => $tags
        ]);
    }
}
