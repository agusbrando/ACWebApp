<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    protected $primaryKey = 'id';
    // protected $primaryKey = 'item_id';

    public $timestamps = true;

    // Asignación masiva
    protected $fillable =[
        'id',
        'name',
        'date_pucharse',
        'classroom_id', //classroom_id
        'state_id', //status_id
        'type_id', //item_type_id
        

    ];
}
