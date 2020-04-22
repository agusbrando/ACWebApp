<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluable extends Model
{
    protected $guarded = [];

    public function programs(){
        return $this->belongsToMany(Program::class, 'evaluateds', 'evaluable_id', 'program_id')->using(Evaluated::class)->withTimeStamps()->withPivot('description','id');
    }
}