<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    protected $guarded = [];

    public function programacion(){
        return $this->belongsTo('App\Programacion', 'id_programacion');
    }
}
