<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    protected $table = 'usertype';
    protected $primaryKey = 'increments';
    protected $fillable = ['nameType'];

    public function userTable(){
        return $this->hasMany('App\UserTable', 'increments', 'typeId');
    }
}
