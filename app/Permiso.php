<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table = 'permisos';
    protected $pimaryKey = 'id_permiso';
    const CREATED_AT = 'Creacion';
    const UPDATED_AT = 'Actualizacion';
}
