<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    
    protected $table = 'users';

    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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

    public function timetable()
    {
        return $this->belongsTo('App\Models\Timetable');
    }

    public function tasks(){
        return $this->belongsToMany(Task::class, 'califications')->using(Calification::class)->withPivot('value')->withTimestamps();
    }
    public function programs_responsable(){
        return $this->hasMany(Program::class, 'user_id');
    }
   
    public function programs_professor(){
        return $this->hasMany(Program::class, 'professor_id');
    }
}
