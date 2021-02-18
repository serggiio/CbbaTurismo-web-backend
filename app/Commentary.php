<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentary extends Model
{
    protected $table = 'commentary';
    protected $primaryKey = 'commentaryId';
    protected $fillable = ['userId', 'touristicPlaceId', 'commentaryDesc', 'reports', 'commentatyStatus'];

    public function touristicPlace(){
        return $this->belongsTo('App\TouristicPlace', 'touristicPlaceId', 'touristicPlaceId');
    }

    public function user(){
        return $this->belongsTo('App\UserTable', 'userId', 'userId');
    }
}
