<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $guarded = [];

    //todas las yearUnion de ese curso, una por evaluacion y asignatura
    public function yearUnion(){
        return $this->hasMany(YearUnion::class);
    }
}
