<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'courses';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'level',
        'created_at',
        'updated_at'

    ];
}
