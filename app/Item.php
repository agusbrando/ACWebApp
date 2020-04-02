<?php

namespace App;

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
        'nombre',
        'fecha_compra',
        'id_aula', //classroom_id
        'id_estado', //status_id
        'id_tipo_item', //item_type_id
        

    ];
}
