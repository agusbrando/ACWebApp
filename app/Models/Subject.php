<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';
    protected $guarded = [];

    public function course(){
        return $this->belongsTo('App\Models\Course');
    }

    public function evaluations(){
        return $this->hasMany('App\Models\Evaluation');
    }
}

 public function programs(){
        return $this->hasMany(Program::class);
   }
