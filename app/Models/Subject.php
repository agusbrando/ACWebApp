<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SubjectsUsers;

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

   public function programs(){
        return $this->hasMany(Program::class);
   }

    
    public function timetables()
    {
        return $this->hasMany('App\Models\SessionTimetable');
    }

    public function users(){
        return $this->belongsToMany(User::class,'subjects_users')->using(SubjectsUsers::class)->withTimestamps();
    }

}
