<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{

   protected $guarded = [];

   public function programs(){
        return $this->hasMany(Program::class);
   }
}