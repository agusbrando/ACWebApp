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

    public function events()
    {
        return $this->belongsTo('App\Models\Event', 'session_id');
    }

    public function types()
    {
        return $this->belongsTo('App\Models\Type', 'type_id');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

}
