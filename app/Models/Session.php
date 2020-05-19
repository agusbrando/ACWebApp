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

   

    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom');
    }

    public function sessionTimetables()
    {
        return $this->belongsToMany(Timetable::class,'session_timetables')->withTimestamps();
    }
    

    public function event()
    {
        return $this->hasOne(Event::class);
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Type', 'type_id');
        // return $this->belongsTo('App\Models\Type', 'type_id')->where('model', 'App\Models\Session');
    }

   

}
