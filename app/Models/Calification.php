<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Calification extends Pivot
{
    protected $table = 'califications';
    protected $guarded = [];
    //TODO deleted?
}
