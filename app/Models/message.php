<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
      protected $table = 'messages';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function sends()
    {
        return $this->hasMany('App\Models\Send');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function attachments()
    {
        return $this->morphMany('App\Models\Attachment', 'attachmentable');
    }


    
}
