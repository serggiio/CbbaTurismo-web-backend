<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'province';
    protected $primaryKey = 'provinceId';
    protected $fillable = ['provinceName', 'latitude', 'longitude'];

    public function touristicPlace(){
        return $this->hasMany('App\TouristicPlace', 'provinceId', 'provinceId');
    }
    
}
