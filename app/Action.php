<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $table = 'action';
    protected $primaryKey = 'actionId';
    protected $fillable = ['userId', 'actionName', 'table', 'oldData', 'newData', 'ip'];

    
    public function user()
    {
        return $this->belongsTo('App\UserTable', 'userId', 'userId');
    }
}
