<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class SubjectsUsers extends Pivot
{
    protected $table = 'subjects_users';
    protected $guarded = [];
}
