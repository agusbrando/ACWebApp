<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $table = 'attachments';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function attachmentable()
    {
        return $this->morphTo();
    }




}
