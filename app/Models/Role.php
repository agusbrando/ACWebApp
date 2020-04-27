<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $guarded = [];

    public function users(){
        return $this->belongsToMany(Type::class)->withPivot('permissions','role_permissions','roles')->withTimestamps();
    }
}
