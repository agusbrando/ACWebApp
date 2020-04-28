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
        'type_id',
        'day',
        'time_start',
        'time_end'
        
    ];

    protected $casts = [
        'time_start' => 'date:hh:mm',
        'time_end' => 'date:hh:mm',
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

    public function type()
    {
        return $this->belongsTo('App\Models\Type', 'type_id');
        // return $this->belongsTo('App\Models\Type', 'type_id')->where('model', 'App\Models\Session');
    }

}
