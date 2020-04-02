<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventsModel extends Model
{
    protected $table = 'events';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'types_id',
        'sessions_id',
        'users_id',
        'description',
        'date'
    ];

    public function events()
    {
        return $this->belongsTo('App\Models\EventsModel', 'sessions_id');
    }

    public function types()
    {
        return $this->belongsTo('App\Models\TypesModel', 'types_id');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\UsersModel', 'users_id');
    }

}
