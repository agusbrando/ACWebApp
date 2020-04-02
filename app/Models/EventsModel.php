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
        'users_id' ,
        'description',
        'date'
    ];

}
