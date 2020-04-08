<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Nombre tabla
    protected $table = 'posts';

    //Nombre primaryKey
    protected $primaryKey = 'id';

    //Columnas tabla
    protected $fillable = [
        'id',
        'user_id',
        'text'
    ];

    //Relaciones
    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }

    public function attachments() {
        return $this->morphMany('App\Models\Attachment', 'attachable');
    }
}
