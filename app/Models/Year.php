<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $table = 'years';
    protected $guarded = [];
    
    public function yearUnions(){
        return $this->hasMany(YearUnion::class);
    }
    
}
