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
        'model',
        'time_start',
        'time_end'
    ];

    public function sessions()
    {
        return $this->hasOne('App\Models\SessionsModel', 'sessions_id');
    }

    public function classes()
    {
        return $this->belongsTo('App\Models\ClassroomModel', 'classroom_id');
    }

}
