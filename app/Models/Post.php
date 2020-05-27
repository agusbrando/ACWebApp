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
        'title',
        'text'
    ];

    //Relaciones
    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function attachmentablements() {
        return $this->morphMany('App\Models\Attachment', 'attachmentable');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
