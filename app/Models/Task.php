<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected $guarded = [];

    public function evaluations(){
        return $this->belongsTo('App\Models\Evaluation');
    }

    public function califications(){
        return $this->belongsToMany(User::class, 'califications')->using(Calification::class)->withPivot('value')->withTimestamps();
    }
}
