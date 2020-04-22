<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    protected $primaryKey = 'id';

    public $timestamps = true;

    // Asignación masiva
    protected $guarded =[]; //En vez de poner fillable y todos los atributos,
                            //con esto se anaden todos los atributos directamente.
    //Relaciones
    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'items-users', 'item_id', 'user_id')->withPivot('date_inicio', 'date_fin')->withTimestamps();
        
    }
    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom');
        
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Type')->where('model', Item::class);
        
    }

}
