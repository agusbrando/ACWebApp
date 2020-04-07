<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function sends()
    {
        return $this->hasMany('App\Models\Send');
    }
    public function timetable()
    {
        return $this->belongsTo('App\Models\Timetable');
    }
}
