<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
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
    public function misbehaviors()
    {
        return $this->hasMany('App\Misbehavior');
    }
}
