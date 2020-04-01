<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'usuarios';
    protected $pimaryKey = 'id_permiso';
    const CREATED_AT = 'Creacion';
    const UPDATED_AT = 'Actualizacion';
}
