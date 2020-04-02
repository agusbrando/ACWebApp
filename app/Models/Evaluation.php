<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $table = 'evaluations';
    protected $guarded = [];

    public function subjects(){
        return $this->belongsTo('App\Models\Subject');
    }

    public function tasks(){
        return $this->hasMany('App\Models\Task');
    }

    public function percentages(){
        return $this->belongsToMany(Type::class, 'percentages')->using(Percentage::class)->withPivot('percentage')->withTimestamps();
    }
}
