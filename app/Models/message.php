<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
      protected $table = 'messages';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function sends()
    {
        return $this->hasMany('App\Models\send');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\user');
    }

    public function attachments()
    {
        return $this->morphMany('App\Models\attachment', 'attachmentable');
    }


    
}
