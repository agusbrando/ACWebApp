<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name'
    ];
    
    public function roles()
    {
        return $this->belongsToMany(Role::class,'roles_permissions','id_permission','role_id')->using(RolePermission::class)->withTimeStamps();
    }
}
