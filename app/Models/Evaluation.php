<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $table = 'evaluations';
    protected $guarded = [];

    public function subject(){
        return $this->belongsTo('App\Models\Subject');
    }

    public function tasks(){
        return $this->hasMany('App\Models\Task');
    }

    public function types(){
        return $this->belongsToMany(Type::class)->withPivot('percentage','nota_min','nota_media')->withTimestamps();
    }
}
