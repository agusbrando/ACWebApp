<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $guarded = [];

    public function trackings()
    {
        return $this->hasMany('App\Models\Trackings', 'user_id');
    }

    public function roles()
    {
        return $this->belongsTo('App\Models\Role', 'rol_id');
    }

    public function timetables()
    {
        return $this->belongsTo('App\Models\Timetable', 'timetable_id');
    }

    public function califications(){
        return $this->belongsToMany(Task::class, 'califications')->using(Calification::class)->withPivot('value')->withTimestamps();
    }
}
