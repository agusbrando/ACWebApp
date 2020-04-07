<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'role_id',
        'first_name',
        'last_name',
        'email',
        'password'
    ];

    public function events()
    {
        return $this->hasMany('App\Models\Event', 'user_id');
    }

    public function roles()
    {
        return $this->belongsTo('App\Models\Role', 'role_id');
    }

}
