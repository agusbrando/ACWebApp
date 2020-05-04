<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YearUnion extends Model
{
    protected $table = 'yearUnions';

    protected $primaryKey = 'id';

    public $timestamps = true;
    
    protected $guarded =[];
}
