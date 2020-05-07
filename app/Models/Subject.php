<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';
    protected $guarded = [];

    //posible union con year union y sesion timetable
    public function timetables()
    {
        return $this->hasMany('App\Models\SessionTimetable');
    }

    /**todas las yearUnion con esa asignatura, una por evaluacion y por curso (si se repiten)*/
    public function yearUnion(){
        return $this->hasMany(YearUnion::class);
    }

}
