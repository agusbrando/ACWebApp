<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class AspectoEvaluado extends Pivot
{
    protected $table = 'aspectos_evaluados';
    protected $guarded = [];

}
