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
    protected $guarded = [];

    //Relaciones
    public function attachmentable() {
        return $this->morphTo();
    }
}
