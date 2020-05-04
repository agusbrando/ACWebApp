<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YearUnionUser extends Model
{
    protected $table = 'yearUnionUsers';

    protected $primaryKey = 'id';

    public $timestamps = true;
    
    protected $guarded =[];
}
