<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
 
    protected $table = 'classrooms';

    protected $primaryKey = 'id';

   

    /**
    * The primary key associated with the table.
    *
    * @var string
    */
  
    /**
    * Indicates if the IDs are auto-incrementing.
    * Por defecto Eloquent asume que la clave primaria 
    * es un valor incremental y de tipo int, 
    * Si fuera de tipo string o no fuera auto incremental pondríamos false
    * @var bool
    */
    public $incrementing = true;


    /**
    * The "type" of the auto-incrementing ID.
    * Si tu clave primaria no es un entero, debes establecer 
    * la propiedad protegida $keyType de tu modelo a string,
    * como en este caso
    * @var string
    */
    // protected $keyType = 'string';

    public $timestamps = true;

    protected $fillable =[
        'id',
        'name',
        'number',
    ];
   
    
    public function sessions(){
        return $this->hasMany('App\Models\Session');
    }
    

    //Relacion entre Item Y Classroom
    public function items()
    {
        return $this->hasMany('App\Models\Item');
    }

    
}
