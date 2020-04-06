<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SessionsModel extends Model
{
    protected $table = 'sessions';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'classroom_id',
        'time_start',
        'time_end',
        'model'
    ];
    public function Classroom(){
        return $this->belongsTo('App\Models\Classroom');
    }
    public function timetables()
    {
        return $this->hasMany('App\Models\SessionTimetable');
    }
}
