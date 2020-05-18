<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evaluation extends Model
{
    use SoftDeletes;
  
    protected $table = 'evaluations';
    protected $guarded = [];

    protected $dates = ['deleted_at'];

     //todas las yearUnion de esa evaluacion, una por curso y asignatura
     public function yearUnions(){
        return $this->hasMany(YearUnion::class);
    }
}
