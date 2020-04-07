<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SessionTimetable extends Model
{
    protected $table ='session_timetables';
 
    protected $primaryKey ='id';
 
    protected $fillable = [
        
    ];
    public function misbehaviors()
    {
        return $this->hasMany('App\Misbehavior');
    }
}
