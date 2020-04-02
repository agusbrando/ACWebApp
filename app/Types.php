<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    protected $table = 'types';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'model',
        'name',
    ];

    public function events()
    {
        // return $this->hasMany('App\Models\EventsModel', 'types_id');
    }
}
