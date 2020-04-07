<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //Nombre tabla
    protected $table = 'users';

    //Nombre primaryKey
    protected $primaryKey = 'id';

    //Columnas tabla
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'password',
        'email'
    ];

    //Relaciones
    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }
}
