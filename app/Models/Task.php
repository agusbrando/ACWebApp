<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected $guarded = [];

    //lista de todos los year union users con sus calificaciones en las tareas, de una evaluacion en concreto de una asignatura en concreto
    public function yearUnionUsers()
    {
        return $this->belongsToMany(YearUnionUser::class, 'califications')->using(Calification::class)->withPivot('value')->withTimestamps();
    }
    public function type()
    {
        return $this->belongsTo('App\Models\Type');
    }
    public function yearUnion()
    {
        return $this->belongsTo(YearUnion::class);
    }
}
