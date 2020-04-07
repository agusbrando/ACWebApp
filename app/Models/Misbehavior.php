<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Misbehavior extends Model
{
    protected $table = 'misbehaviors';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'description',
        'type_id',
        'created_at',
        'updated_at'

    ];
    public function user(){
        $this ->BelongsTo(User::class);
    }
    public function type(){
        $this ->BelongsTo(SessionTimetable::class);
    }
    public function session(){
        $this ->BelongsTo(Type::class);
    }
}
