<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypesModel extends Model
{
    protected $table = 'types';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'model'
    ];

    
}
