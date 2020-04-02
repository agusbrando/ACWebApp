<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Misbehaviors extends Model
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
}
