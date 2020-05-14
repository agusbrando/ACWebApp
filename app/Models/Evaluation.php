<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Evaluation extends Model
{
    use SoftDeletes;
  
    protected $table = 'evaluations';
    protected $guarded = [];   


     //todas las yearUnion de esa evaluacion, una por curso y asignatura
     public function yearUnions(){
        return $this->hasMany(YearUnion::class);
    }
}
