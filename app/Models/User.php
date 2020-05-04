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

    public function responsables()
    {
        return $this->belongsToMany('App\Models\Item', 'item_user', 'user_id', 'item_id')->withPivot('date_inicio', 'date_fin')->withTimestamps();
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
        return $this->belongsToMany(Task::class, 'califications')->withPivot('value')->withTimestamps();
    }
    public function programs_responsable()
    {
        return $this->hasMany(Program::class, 'user_id');
    }

    public function programs_professor()
    {
        return $this->hasMany(Program::class, 'professor_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function subjects(){
        return $this->belongsToMany(Subject::class,'subjects_users')->using(SubjectsUsers::class)->withTimestamps();
    }
     
}
