<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'images';
    protected $primaryKey = 'imageId';
    protected $fillable = [
        'galleryId', 'imagePath'
    ];

    public function gallery(){
        return $this->belongsTo('App\Gallery', 'galleryId', 'galleryId');
    }
}
