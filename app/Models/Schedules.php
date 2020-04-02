<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedules extends Model
{
    protected $table = 'schedules';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'id_subjects',
        'description',
        'date',
        'created_at',
        'updated_at'

    ];
}
