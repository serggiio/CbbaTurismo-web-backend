<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';
    protected $primaryKey = 'statusId';
    protected $fillable = ['statusName'];

    //un estado tiene muchos usuarios
    public function userTable(){
        return $this->hasMany('App\UserTable', 'statusId', 'statusId');
    }
    
    public function touristicPlace(){
        return $this->hasMany('App\TouristicPlace', 'statusId', 'placeStatusId');
    }
    
}
