<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    //Nombre tabla
    protected $table = 'attachments';

    //Nombre primaryKey
    protected $primaryKey = 'id';

    //Columnas tabla
    protected $fillable = [
        'id',
        'name',
        'attachmentable_id',
        'attachmentable_type'

    ];

    //Relaciones
    public function attachable() {
        return $this->morphTo();
    }
}
