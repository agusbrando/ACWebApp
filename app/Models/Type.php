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

    public function yearUnions(){
        return $this->belongsToMany(YearUnion::class, 'percentages', 'type_id', 'year_union_id')->using(Percentage::class)->withPivot('percentage','min_grade','average_grade')->withTimestamps();
    }

    public function sessions()
    {
        return $this->hasMany('App\Models\Session' , 'type_id');
    }
    
    public function misbehaviors()
    {
        return $this->hasMany('App\Models\Misbehavior');
    }
    public function items()
    {
        return $this->hasMany('App\Models\Item');
    }

    public function percentages(){
        return $this->belongsToMany(Type::class)->using(Percentage::class)->withPivot('percentage')->withTimestamps();
    }
}