<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SessionTimetable extends Model
{
    protected $table ='session_timetables';
 
    protected $primaryKey ='id';
 
    protected $fillable = [
        
    ];

    
    public function subjects(){
        return $this->belongsTo('App\Models\Subject');
    }
    
     public function misbehaviors()
    {
        return $this->hasMany('App\Models\Misbehavior');
    }
}
