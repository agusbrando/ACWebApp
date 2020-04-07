<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $guarded = [];

    public function trackings()
    {
        return $this->hasMany('App\Models\Trackings');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function timetable()
    {
        return $this->belongsTo('App\Models\Timetable');
    }

    public function tasks(){
        return $this->belongsToMany(Task::class, 'califications')->using(Calification::class)->withPivot('value')->withTimestamps();
    }
}
