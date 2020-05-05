<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YearUnionUser extends Model
{
    protected $table = 'yearUnionUsers';

    protected $primaryKey = 'id';

    public $timestamps = true;
    
    protected $guarded =[];

    /*public function yearUnion(){
        return $this->belongsTo(YearUnionUser::class,'year_union_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    */
    
}
