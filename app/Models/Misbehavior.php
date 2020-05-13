<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Misbehavior extends Model
{
    protected $table = 'misbehaviors';

    protected $primaryKey = 'id';

    protected $guarded = [];


    public function sessionTimetable(){
        return $this->BelongsTo(SessionTimetable::class);
    }

    public function type(){
        return $this->BelongsTo(Type::class);
    }

    public function yearUnionUser(){
        return $this->BelongsTo(YearUnionUser::class);
    }
}
