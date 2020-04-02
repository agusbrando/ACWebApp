<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $guarded = [];

    public function role(){
        return $this->belongsTo('App\Models\Role');
    }

    public function califications(){
        return $this->belongsToMany(Task::class, 'califications')->using(Calification::class)->withPivot('value')->withTimestamps();
    }

}
