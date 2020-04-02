<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassesModel extends Model
{
    protected $table = 'classes';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'number'
    ];
}
