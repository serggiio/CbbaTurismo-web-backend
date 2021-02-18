<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'categoryId';
    protected $fillable = ['tagId', 'categoryName'];

    public function Tag(){
        return $this->belongsTo('App\Tag', 'tagId', 'tagId');
    }

    public function touristicPlace(){
        return $this->belongsToMany('App\TouristicPlace', 'placecategory', 'categoryId');
    }
}
