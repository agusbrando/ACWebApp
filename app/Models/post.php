<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function attachments()
    {
        return $this->morphMany('App\Models\attachment', 'attachmentable');
    }

}
