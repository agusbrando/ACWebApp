<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CourseSubject extends Pivot
{
    //Indicamos la tabla a la que pertenece
    protected $table = 'course_subject';
   
    protected $guarded = [];
    
   
}
