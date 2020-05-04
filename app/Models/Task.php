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
        return $this->belongsToMany(User::class,'califications')->withPivot('value')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\Type');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Type');
    }
}
