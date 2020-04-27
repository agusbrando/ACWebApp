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
        return $this->belongsToMany(Evaluation::class)->withPivot('percentage','nota_min','nota_media')->withTimestamps();
    }

    public function misbehaviors()
    {
        return $this->hasMany('App\Models\Misbehavior');
    }
    public function items()
    {
        return $this->hasMany('App\Models\Item');
    }

    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }
}
