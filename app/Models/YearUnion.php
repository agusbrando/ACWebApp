<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YearUnion extends Model
{
    protected $table = 'yearUnions';

    protected $primaryKey = 'id';

    public $timestamps = true;
    
    protected $guarded =[];

    public function year(){
        return $this->belongsTo(Year::class);
    }
    public function program(){
        return $this->belongsTo(Program::class);
    }
    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function evaluation(){
        return $this->belongsTo(Evaluation::class);
    }
    public function subject(){
        return $this->belongsTo(Subject::class);
    }
    public function responsable(){
        return $this->belongsTo(User::class);
    }
    //** lista de todos los year unions user que tengan este year union */
    public function yearUnionUsers(){
        return $this->hasMany(YearUnionUser::class,'year_union_id');
    }

    //** lista de usuarios con ese year union (compañeros de clase) */
    public function users(){
        return $this->belongsToMany(User::class, 'yearUnionUsers', 'year_union_id', 'user_id')->using(YearUnionUser::class)->withTimeStamps()->withPivot('assistance','id');
    }
}
