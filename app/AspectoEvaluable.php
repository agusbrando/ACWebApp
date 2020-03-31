<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AspectoEvaluable extends Model
{
    protected $table = 'aspectos_evaluables';
    protected $guarded = [];

    public function programaciones(){
        return $this->belongsToMany(Programacion::class, 'aspectos_evaluados', 'id_aspecto', 'id_programacion')->using('App\AspectoEvaluado')->withTimeStamps()->withPivot('descripcion');
    }
}