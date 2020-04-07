<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected $guarded = [];

    public function evaluation(){
        return $this->belongsTo('App\Models\Evaluation');
    }

    public function users(){
        return $this->belongsToMany(User::class)->using(Calification::class)->withPivot('value')->withTimestamps();
    }
}
