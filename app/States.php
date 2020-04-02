<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class States extends Model
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
}
