<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name'
    ];
    
    public function user()
    {
        return $this->hasMany('app/Models/User');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'roles_permissions','role_id','id_permission')->using(RolePermission::class)->withTimeStamps();
    }
}
