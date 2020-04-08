<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timeable extends Model
{
    protected $table ='timetables';
 
    protected $primaryKey ='id';
 
    protected $guarded = [];

    public function timetables()
    {
        return $this->hasMany('App\Models\SessionTimetable');
    }
}
