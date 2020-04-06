<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';
    protected $guarded = [];

    //lista de usuarios con ese rol
    public function users(){
        return $this->hasMany(User::class);
    }
}
