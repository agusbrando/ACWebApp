<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public function events()
    {
        return $this->hasMany('App\Models\Event', 'user_id');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role', 'role_id');
    }

    public function timetable()
    {
        return $this->belongsTo('App\Models\Timetable', 'timetable_id');
    }

   /**Todas las programaciones de las cuales es profesor**/
   public function programs_professor(){
        return $this->hasMany(Program::class, 'professor_id');
   }

   /**Todas las programaciones de las cuales es responsable**/
   public function programs_responsable(){
        return $this->hasMany(Program::class, 'user_id');
   }

   public function trackings()
   {
        return $this->hasMany('App\Models\Trackings');
   }

    public function tasks(){
        return $this->belongsToMany(Task::class)->using(Calification::class)->withPivot('value')->withTimestamps();
    }

}
