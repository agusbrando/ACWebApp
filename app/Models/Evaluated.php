<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Evaluated extends Pivot
{
    protected $table = 'evaluateds';
    protected $guarded = [];

}
