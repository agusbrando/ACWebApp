<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'Programs';
    protected $guarded = [];

    public function subject(){
        return $this->belongsTo(Subject::class);
    }
    public function responsable(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function professor(){
        return $this->belongsTo(User::class, 'professor_id');
    }
    public function units(){
        return $this->hasMany(Unit::class);
    }
    public function evaluateds(){
        return $this->belongsToMany(Evaluable::class, 'evaluateds', 'program_id', 'evaluable_id')->using(Evaluated::class)->withTimeStamps()->withPivot('description');
    }

}
