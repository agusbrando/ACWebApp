<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Percentage extends Pivot
{
    protected $table = 'evaluation_type';
    protected $guarded = [];
}
