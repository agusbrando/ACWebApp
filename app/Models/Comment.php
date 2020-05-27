<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //Nombre tabla
    protected $table = 'comments';

    //Nombre primaryKey
    protected $primaryKey = 'id';

    //Columnas tabla
    protected $fillable = [
        'id',
        'user_id',
        'post_id',
        'text'
    ];

    //Relaciones
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function post() {
        return $this->belongsTo(Post::class);
    }
}
