<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class SessionTimetable extends Pivot
{
    protected $table ='session_timetables';

    protected $primaryKey ='id';

    protected $guarded = [];

    
    public function subject(){
        return $this->belongsTo('App\Models\Subject');
    }
    //** lista de todos los year unions user que tengan este year union */
    public function yearUnion(){
        return $this->belongsTo(YearUnion::class);
    }

     public function misbehaviors()
    {
        return $this->hasMany(Misbehavior::class);
    }
}
