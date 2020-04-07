<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    protected $table = 'roles_permissions';
    
    protected $fillable = [
        'role_id',
        'id_permission'
    ];
}
