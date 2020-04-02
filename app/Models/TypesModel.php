<?php

namespace App\Models;

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

    public function events()
    {
        return $this->hasMany('App\Models\EventsModel', 'types_id');
    }
}
