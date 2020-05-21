<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Message extends Model
{
    use SoftDeletes;

    protected $with = ['attachments'];
    protected $table = 'messages';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $dates = ['deleted_at'];


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function attachments()
    {
        return $this->morphMany('App\Models\Attachment', 'attachmentable');
    }
    public function users()
    {
        return $this->belongsToMany('App\Models\User')->withPivot('read')->withTimeStamps();
    }

}
