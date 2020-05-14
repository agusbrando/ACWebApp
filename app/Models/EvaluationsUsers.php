<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class EvaluationsUsers extends Pivot
{
    protected $table = 'evaluations_users';
    protected $guarded = [];
}
