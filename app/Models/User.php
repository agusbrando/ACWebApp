<?php

namespace App\Models;

use App\Models\SubjectsUsers;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use AjCastro\EagerLoadPivotRelations\EagerLoadPivotTrait;

class User extends Authenticatable 
{
    use Notifiable;
    use EagerLoadPivotTrait;

    protected $table = 'users';

    protected $primaryKey = 'id';
    protected $guarded = [];
    
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_ad'=>'datetime',
    ];

    public function events()
    {
        return $this->hasMany('App\Models\Event');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role', 'role_id');
    }

    
   

    public function trackings()
    {
        return $this->hasMany('App\Models\Trackings');
    }
    public function misbehaviors()
    {
        return $this->hasMany('App\Models\Misbehavior');
    }

    public function timetable()
    {
        return $this->belongsTo('App\Models\Timetable');
    }

    
    //todas las year unions en las que haya un responsable
    public function yearUnionsResponsable()
    {
        return $this->hasMany(YearUnion::class, 'user_id');
    }

    public function programs_professor()
    {
        return $this->hasMany(Program::class, 'professor_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
    
    //** lista de year unions (asignaturas por cada evaluacion) en las que esta matriculado el alumno */
    public function yearUnions(){
        return $this->belongsToMany(YearUnion::class, 'yearUnionUsers', 'user_id', 'year_union_id')->using(YearUnionUser::class)->withTimeStamps()->withPivot('assistance','id');
    }
}
