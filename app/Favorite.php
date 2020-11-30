<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'favorite';
    protected $primaryKey = 'favoriteId';
    protected $fillable = ['userId', 'touristicPlaceId'];

    public function touristicPlace(){
        return $this->belongsTo('App\TouristicPlace', 'touristicPlaceId', 'touristicPlaceId');
    }
}
