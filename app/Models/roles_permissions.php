<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roles_permissions extends Model
{
    protected $table = 'roles_permissions';
    protected $pimaryKey = 'id_role_permission';
    const CREATED_AT = 'Creacion';
    const UPDATED_AT = 'Actualizacion';
    
    public function roles_permissions()
    {
        return $this->belongsToMany('App/Models/Role');
    }
}
