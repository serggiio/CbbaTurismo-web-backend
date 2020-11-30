<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TouristicPlace extends Model
{
    protected $table = 'touristicplace';
    protected $primaryKey = 'touristicPlaceId';
    protected $fillable = [
        'provinceId', 'userId', 'placeStatusId', 'description', 'history', 'placeName', 'mainImage', 'mainVideo', 'streets', 'latitude', 'longitude', 'businessHours', 'type', 'startDate', 'endDate'
    ];

    public function province(){
        return $this->belongsTo('App\Province', 'provinceId', 'provinceId');
    }

    public function user(){
        return $this->belongsTo('App\UserTable', 'userId', 'userId');
    }

    public function status(){
        return $this->belongsTo('App\Status', 'placeStatusId', 'statusId');
    }

    public function rate(){
        return $this->hasMany('App\Rate', 'touristicPlaceId', 'touristicPlaceId');
    }

    public function favorite(){
        return $this->hasMany('App\Favorite', 'touristicPlaceId', 'touristicPlaceId');
    }

    public function tag(){
        return $this->belongsToMany('App\Tag', 'placetag', 'touristicPlaceId', 'tagId');
    }

    public function gallery(){
        return $this->hasMany('App\Gallery', 'touristicPlaceId', 'touristicPlaceId');
    }

    
    
}
