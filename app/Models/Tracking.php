<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
   protected $table ='trackings';

   protected $primaryKey ='id';

   protected $fillable = [
    'signature',
    'user_id',
    'date_signature',
    'time_start',
    'time_end',
    'num_hours'
    

   ];
   public function user()
    {
        return $this->belongsTo('App\Models\User');
    }    
   
}

