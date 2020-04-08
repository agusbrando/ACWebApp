<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'sessions';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'classroom_id',
        'model',
        'time_start',
        'time_end'
    ];

    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom');
    }

    public function sessionTimetables()
    {
        return $this->belongsToMany(Timetable::class, 'session_timetable')->using(SessionTimetable::class)->withPivot('')->withTimestamps();
    }
    

    public function event()
    {
        return $this->hasOne('App\Models\Event');
    }

}
