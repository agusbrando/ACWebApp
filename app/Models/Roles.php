<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';
    protected $guarded = [];
    protected $fillable = [
        'id',
        'name'

    ];

    public function users(){
        return $this->hasMany('App\Models\User');
    }
}
