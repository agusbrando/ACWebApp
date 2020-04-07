<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $table = 'classrooms';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'number'
    ];

    public function sessions()
    {
        return $this->hasMany('App\Models\Session');
    }

}
