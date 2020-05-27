<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $primaryKey = 'id';
    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_ad' => 'datetime',
    ];



    // public function authorizeRoles($roles)
    // {
    //     if ($this->hasAnyRole($roles)) {
    //         return true;
    //     }
    //     abort(401, 'Esta acción no está autorizada.');
    // }
    // public function hasAnyRole($roles)
    // {
    //     if (is_array($roles)) {
    //         foreach ($roles as $role) {
    //             if ($this->hasRole($role)) {
    //                 return true;
    //             }
    //         }
    //     } else {
    //         if ($this->hasRole($roles)) {
    //             return true;
    //         }
    //     }
    //     return false;
    // }
    // public function hasRole($role)
    // {
    //     if ($this->roles()->where('name', $role)->first()) {
    //         return true;
    //     }
    //     return false;
    // }




    public function events()
    {
        return $this->hasMany('App\Models\Event');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role', 'role_id');
    }

    // public function roles()
    // {
    //     return $this
    //         ->belongsToMany('App\Models\Role')
    //         ->withTimestamps();
    // }


    public function trackings()
    {
        return $this->hasMany('App\Models\Tracking');
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

    public function messagesReceive()
    {
        return $this->belongsToMany('App\Models\Message')->withPivot('read')->withTimeStamps();
    }

    public function messagesSent()
    {
        return $this->hasMany('App\Models\Message');
    }

    //** lista de year unions (asignaturas por cada evaluacion) en las que esta matriculado el alumno */
    public function yearUnions()
    {
        return $this->belongsToMany(YearUnion::class, 'yearUnionUsers', 'user_id', 'year_union_id')->using(YearUnionUser::class)->withTimeStamps()->withPivot('assistance', 'id');
    }

    public function tasks()
    {
        return $this->hasManyThrough(Task::class, YearUnionUser::class);
    }

    public function session()
    {
        return $this->hasMany('App\Models\Session');
    }

    //function posts
    public function posts() {
        return $this->hasMany(Post::class);
    }

}
