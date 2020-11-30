<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTable extends Model
{
    protected $table = 'usertable';
    protected $primaryKey = 'userId';
    protected $fillable = ['statusId', 'typeId', 'name', 'lastName', 'phoneNumber', 'email', 'password', 'verificationCode'];

    
    public function status()
    {
        return $this->belongsTo('App\Status', 'statusId', 'statusId');
    }

    
    public function userType(){
        return $this->belongsTo('App\UserType', 'typeId', 'increments');
    }

    public function touristicPlace(){
        return $this->hasMany('App\TouristicPlace', 'userId', 'userId');
    }
    
    
}
