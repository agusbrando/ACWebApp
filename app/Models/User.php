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

    public function trackings()
    {
        return $this->hasMany('App\Models\Trackings', 'user_id');
    }
    public function role()
    {
        return $this->belongsTo('App\Models\Role', 'role_id');
    }

    public function timetables()
    {
        return $this->belongsTo('App\Models\Timetable', 'timetable_id');
    }
}
