<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SessionsModel extends Model
{
    protected $table = 'sessions';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'classes_id',
        'time_start',
        'time_end',
        'model'
    ];

}
