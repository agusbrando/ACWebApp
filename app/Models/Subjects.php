<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    protected $table = 'subjects';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'course_id',
        'created_at',
        'updated_at'

    ];
}
