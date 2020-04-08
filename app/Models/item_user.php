<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item_user extends Pivot  //Al ser la tabla intermedia extiende de Pivot
{
    protected $table = 'items-users';
    protected $guarded =[]; //En vez de poner fillable y todos los atributos,
                            //con esto se anaden todos los atributos directamente.
    
}
