<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
    ];

    public function events()
    {
        // return $this->hasMany('App\Models\EventsModel', 'types_id');
    }

    public function items()
    {
        
        return $this->hasMany('App\Models\Item' , 'state_id');
    }
}
