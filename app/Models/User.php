<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable 
{
    use Notifiable;

    protected $table = 'users';

    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
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

    
    public function items()
    {
        return $this->belongsToMany('App\Models\Item', 'items-users', 'user_id', 'item_id')->withPivot('date_inicio', 'date_fin')->withTimestamps();
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

    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'califications')->using(Calification::class)->withPivot('value')->withTimestamps();
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
