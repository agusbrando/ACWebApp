<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Percentage extends Pivot
{
    protected $table = 'percentages';
    protected $guarded = [];
}
