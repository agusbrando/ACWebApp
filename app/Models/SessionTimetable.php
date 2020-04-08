<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class SessionTimetable extends Pivot
{
    protected $table ='session_timetables';
 
    protected $primaryKey ='id';
 
    protected $guarded = [];

    
    public function subjects(){
        return $this->belongsTo('App\Models\Subject');
    }
    
     public function misbehaviors()
    {
        return $this->hasMany('App\Models\Misbehavior');
    }
}
