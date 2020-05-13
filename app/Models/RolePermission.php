<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class RolePermission extends Pivot
{
    protected $table = 'roles_permissions';

    protected $fillable = [
        'role_id',
        'id_permission'
    ];

    //TODO delete?
}
