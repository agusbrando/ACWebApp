<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;
    protected $table = 'courses';
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    //todas las yearUnion de ese curso, una por evaluacion y asignatura
    public function yearUnions(){
        return $this->hasMany(YearUnion::class);
    }

    public function subjects(){

        return $this->belongsToMany(Subject::class, 'course_subject');

    }
}
