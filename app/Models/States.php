<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    protected $table = 'states';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
    ];


    public function items()
    {
        return $this->hasMany('App\Models\Item');
    }
}
