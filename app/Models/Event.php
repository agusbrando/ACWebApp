<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'type_id',
        'session_id',
        'user_id',
        'description',
        'date'
    ];

    public function session()
    {
        return $this->belongsTo('App\Models\Session', 'session_id');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Type', 'type_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

}
