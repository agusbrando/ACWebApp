<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'rol_id',
        'password',
        'email',
        'course_id',
        'created_at',
        'updated_at'

    ];
}
