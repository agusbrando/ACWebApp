<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'model',
        'name',
    ];

    public function items()
    {
        return $this->hasMany('App\Models\Item' , 'type_id');
    }
    
}
