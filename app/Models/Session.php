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

    public function session()
    {
        return $this->hasOne('App\Models\Event');
    }

    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'classroom_id');
    }

    public function timetables()
    {
        return $this->hasMany('App\Models\SessionTimetable');
    }

    public function event()
    {
        return $this->hasOne('App\Models\Event');
    }

}
