<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';
    protected $guarded = [];

    public function percentages(){
        return $this->belongsToMany(Type::class, 'percentages')->using(Percentage::class)->withPivot('percentage')->withTimestamps();
    }
}
