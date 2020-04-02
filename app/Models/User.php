<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
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

    public function trackings()
    {
        return $this->hasMany('App\Models\Trackings', 'user_id');
    }
    public function roles()
    {
        return $this->belongsTo('App\Models\Role', 'rol_id');
    }
}
