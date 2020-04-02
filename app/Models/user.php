<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function roles()
    {
        return $this->belongsTo('App\Models\role');
    }

    public function sends()
    {
        return $this->hasMany('App\Models\send');
    }

}
