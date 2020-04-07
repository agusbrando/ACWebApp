<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';
    protected $guarded = [];

    public function evaluations(){
        return $this->belongsToMany(Type::class)->using(Percentage::class)->withPivot('percentage')->withTimestamps();
    }
}
