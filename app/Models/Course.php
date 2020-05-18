<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    //para asignar que vamos a hacer softDelete
    use SoftDeletes; 
    //Indicamos la tabla a la que pertenece
    protected $table = 'courses';
    // especificar qué campos no queremos que se asignen al modelo. 
    //Es decir, se asignan todos excepto los especificados en este array
    protected $guarded = [];
    //Este guardará la fecha en la que eleminamos un objeto
    protected $dates = ['deleted_at'];

    //relaciones
    //todas las yearUnion de ese curso, una por evaluacion y asignatura
    public function yearUnions(){
        return $this->hasMany(YearUnion::class);
    }

    public function subjects(){

        return $this->belongsToMany(Subject::class, 'course_subject');

    }
}
