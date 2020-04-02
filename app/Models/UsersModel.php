<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'rol_id',
        'first_name',
        'last_name',
        'email',
        'password'
    ];

    public function events()
    {
        return $this->hasMany('App\Models\EventsModel', 'users_id');
    }

}
