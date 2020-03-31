<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $guarded = [];
   //Todas las programaciones de las cuales es responsable
   public function programaciones_responsable(){
        return $this->hasMany('App\Programacion', 'id_responsable');
   }
   //Todas las programaciones de las cuales es profesor
   public function programaciones_profesor(){
        return $this->hasMany('App\Programacion', 'id_profesor');
   }
}