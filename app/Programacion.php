<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programacion extends Model
{
    protected $table = 'Programaciones';
    protected $guarded = [];

    public function asignatura(){
        return $this->belongsTo('App\Asignatura', 'id_asignatura');
    }
    public function responsable(){
        return $this->belongsTo('App\Usuario', 'id_responsable');
    }
    public function profesor(){
        return $this->belongsTo('App\Usuario', 'id_profesor');
    }
    public function unidades(){
        return $this->hasMany('App\Unidad', 'id_programacion');
    }
    public function aspectosEvaluados(){
        return $this->belongsToMany(AspectoEvaluable::class, 'aspectos_evaluados', 'id_programacion', 'id_aspecto')->using('App\AspectoEvaluado')->withTimeStamps()->withPivot('descripcion');
    }

}
