<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    protected $table ='timetables';
    protected $primaryKey ='id';
    protected $guarded = [];

    public function sessionTimetables()
    {
        return $this->belongsToMany(Session::class,'session_timetables')->withTimestamps();
    }
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}

