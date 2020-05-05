<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemYear extends Pivot
{
    protected $table = 'itemYears';

    protected $primaryKey = 'id';

    public $timestamps = true;
    
    protected $guarded =[];
}
