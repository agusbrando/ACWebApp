<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public function events()
    {
        return $this->hasMany('App\Models\Event');
    }

    public function evaluations(){
        return $this->belongsToMany(Type::class, 'percentages', 'type_id', 'evaluation_id')->using(Percentage::class)->withPivot('percentage')->withTimestamps();
    }

    public function misbehaviors()
    {
        return $this->hasMany('App\Misbehavior');
    }

}
