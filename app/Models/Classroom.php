<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
   
    protected $table = 'classrooms';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $keyType = 'string';

    public $timestamps = true;

    protected $fillable =[
        'id',
        'name',
        'number',

    ];

    
    public function sessions(){
        return $this->hasMany('App\Models\Session');
    }
    
<<<<<<< HEAD
    
   
=======
    //Relacion entre Item Y Classroom
    public function items()
    {
        return $this->hasMany('App\Models\Item');
    }
>>>>>>> hotfix/migration_master
    
}
