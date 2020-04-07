<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    
    protected $table = 'classrooms';


    /**
    * The primary key associated with the table.
    *
    * @var string
    */
  
    protected $primaryKey = 'classroom_id';


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
    protected $keyType = 'string';


    /**
    * Indicates if the model should be timestamped.
    *
    * @var bool
    */
    public $timestamps = true;

    // Asignación masiva

    // Puedes usar el método create para guardar un nuevo modelo en una sola línea. 
    // La instancia de modelo insertada te será devuelta por el método. Sin embargo, 
    // antes de hacer eso, necesitarás especificar o un atributo fillable o guarded del modelo, 
    // de modo que todos los modelos de Eloquent se protejan contra la asignación masiva de forma predeterminada.

    protected $fillable =[
        'id',
        'name',
        'number',

    ];

    //Relacion entre Item Y Classroom
    public function items()
    {
        
        return $this->hasMany('App\Models\Item' , 'classroom_id');
    }
    
    
}
