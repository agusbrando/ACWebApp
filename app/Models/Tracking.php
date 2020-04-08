<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
   protected $table ='trackings';

   protected $primaryKey ='id';

   protected $fillable = [
    'user_id',
    'datetime_start',
    'datetime_end',
    'num_hours'
    

   ];
   public function user()
    {
        return $this->belongsTo('App\Models\User');
    }    
   
}

