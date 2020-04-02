<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class send extends Model
{
    protected $table = 'sends';
    protected $primaryKey = ['message_id','user_id'];
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo('App\Models\user');
    }

    public function messages()
    {
        return $this->belongsTo('App\Models\message');
    }


}
