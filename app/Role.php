<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $pimaryKey = 'id_role';
    const CREATED_AT = 'Creacion';
    const UPDATED_AT = 'Actualizacion';
}
