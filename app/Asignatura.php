<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{

   protected $guarded = [];

   public function programaciones(){
        return $this->hasMany('App\Programacion', 'id_asignatura');
   }
}