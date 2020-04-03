<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    protected $pimaryKey = 'id_permission';
    const CREATED_AT = 'Creacion';
    const UPDATED_AT = 'Actualizacion';
    
    public function Roles()
    {
        return $this->hasMany('app/Models/Role');
    }
}
