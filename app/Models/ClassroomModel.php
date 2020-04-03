<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassroomModel extends Model
{
    protected $table = 'classroom';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'number'
    ];

    public function sessions()
    {
        return $this->hasMany('App\Models\SessionsModel', 'sessions_id');
    }

}
