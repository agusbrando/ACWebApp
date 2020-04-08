<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Send extends Model
{
    protected $table = 'sends';
    protected $primaryKey = ['message_id','user_id'];
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function message()
    {
        return $this->belongsTo('App\Models\Message');
    }


}
