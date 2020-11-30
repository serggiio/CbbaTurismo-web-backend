<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $table = 'rate';
    protected $primaryKey = 'rateId';
    protected $fillable = ['userId', 'touristicPlaceId', 'puntuacion'];

    public function touristicPlace(){
        return $this->belongsTo('App\TouristicPlace', 'touristicPlaceId', 'touristicPlaceId');
    }
}
