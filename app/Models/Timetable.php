<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    protected $table ='timetables';
    protected $guarded = [];

    public function timetables()
    {
        return $this->hasMany('App\Models\SessionTimetable');
    }
}