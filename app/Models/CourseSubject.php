<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Pivot;


class CourseSubject extends Pivot
{
    //Indicamos la tabla a la que pertenece
    protected $table = 'course_subjects';
   
    protected $guarded = [];
    
   
}
