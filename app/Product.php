<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'productId';
    protected $fillable = ['touristicPlaceId', 'productName', 'productDescription', 'productIcon'];

    
    public function touristicPlace()
    {
        return $this->belongsTo('App\TouristicPlace', 'touristicPlaceId', 'touristicPlaceId');
    }
}
