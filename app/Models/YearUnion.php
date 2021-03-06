<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class YearUnion extends Model
{
    use SoftDeletes; 
    protected $table = 'yearUnions';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $guarded =[];

    protected $dates = ['deleted_at'];

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
    
    //TODO Revisar si se usa
//     //** lista de todos los year unions user que tengan este year union */
//    public function yearUnionUsers(){
//         return $this->hasMany(YearUnionUser::class,'year_union_id');
//     }

    //** lista de usuarios con ese year union (compañeros de clase) */
    public function users(){
        return $this->belongsToMany(User::class, 'yearUnionUsers', 'year_union_id', 'user_id')->using(YearUnionUser::class)->withTimeStamps()->withPivot('assistance');
    }

    //acceso a types de ese year union (asignatura, en una determinada evaluacion) con sus porcentajes (por cada tipo)
    public function types(){
        return $this->belongsToMany(Type::class, 'percentages')->where('model', Task::class)->withPivot('percentage','min_grade_task','average_grade_task','min_average_grade_task')->withTimestamps();
    }

    //posible union con year union y sesion timetable
    public function timetables()
    {
        return $this->hasMany('App\Models\SessionTimetable');
    }
    public function tasks(){
        return $this->hasMany(Task::class);
    }
    public function classroom(){
        return $this->belongsTo(Classroom::class);
    }
}
