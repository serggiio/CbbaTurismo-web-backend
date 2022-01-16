<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tag';
    protected $primaryKey = 'tagId';
    protected $fillable = [
        'tagName'
    ];

    public function touristicPlace(){
        return $this->belongsToMany('App\TouristicPlace', 'placetag', 'tagId');
    }
}
