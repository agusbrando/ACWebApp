<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $guarded = [];
   //Todas las programaciones de las cuales es responsable
   public function programs_responsable(){
        return $this->hasMany(Program::class, 'user_id');
   }
   //Todas las programaciones de las cuales es profesor
   public function programs_professor(){
        return $this->hasMany(Program::class, 'professor_id');
   }
   //Rol de ese usuario
   public function rol(){
        return $this->belongsTo(Rol::class);
   }
}