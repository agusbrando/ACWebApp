<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Model;

class YearUnionUser extends Pivot
{
    protected $table = 'yearUnionUsers';

    protected $primaryKey = 'id';

    public $timestamps = true;
    
    protected $guarded =[];

    /*public function yearUnion(){
        return $this->belongsTo(YearUnionUser::class,'year_union_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    */
    /**listado con todos los items de ese year union user (usuario, en asignatura determinada) */
    public function items(){
        return $this->belongsToMany(Item::class, 'ItemYear', 'year_user_id', 'item_id')->using(ItemYear::class)->withTimeStamps()->withPivot('id');
    }

    /** Devuelve el usuario */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /** Devuelve el yearUnion */
    public function yearUnion(){
        return $this->belongsTo(YearUnion::class);
    }

    //todas las faltas de ese alumno, en esa asignatura, en esa evaluacion
    public function misbehavours(){
        return $this->hasMany(Misbehavior::class,'year_user_id');
    }

}
