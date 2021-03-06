<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SubjectsUsers;

class Subject extends Model
{
    protected $table = 'subjects';
    protected $guarded = [];

    /**todas las yearUnion con esa asignatura, una por evaluacion y por curso (si se repiten)*/
    public function yearUnions(){
        return $this->hasMany(YearUnion::class);
    }
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

    public function courses(){

        return $this->belongsToMany(Course::class, 'course_subject')->using(CourseSubject::class)
        ->withTimeStamps()->withPivot('max_hours','hours');


    }

}
