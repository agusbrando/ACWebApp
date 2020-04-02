<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function users()
    {
        return $this->hasMany('App\Models\user');
    }



}
