<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $guarded = [];

    public function subjects(){
        return $this->hasMany('App\Models\Subject');
    }
}