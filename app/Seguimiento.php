<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
   protected $table ='seguimientos';

   protected $primaryKey ='id';

   protected $fillable = [
    'id_usuario',
    'hora_entrada',
    'hora_salida',
    'horas',
    'fecha'

   ]
       
   
}
