<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery';
    protected $primaryKey = 'galleryId';
    protected $fillable = [
        'touristicPlaceId', 'galleryName', 'galleryPath'
    ];

    public function TouristicPlace(){
        return $this->belongsTo('App\TouristicPlace', 'touristicPlaceId', 'touristicPlaceId');
    }

    public function images(){
        return $this->hasMany('App\Images', 'galleryId', 'galleryId');  
    }
}
