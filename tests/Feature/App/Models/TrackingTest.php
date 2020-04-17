<?php

namespace Tests\Feature\App\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Carbon\Carbon;
use Tests\TestCase;
use App\Models\User;
use App\Models\Role;
use App\Models\Timetable;
use App\Models\Tracking;
class TrackingTest extends TestCase
{
    
    public function testExample()
    {
        $role=Role::create([
            
            'name'=>'Prueba',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $timetable=Timetable::create([
            
            'name' => '2DAM2022',
            'date_start' => Carbon::create('2021','03','30'),
            'date_end' => Carbon::create('2022','03','30'),
            'created_at' => now(),
            'updated_at' => now(),
    
        ]);
        $user=User::create([
            'first_name'=>'Prueba',
            'last_name'=>'Apellidos Prueba',
            'email' => 'preuba.prueba@campusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'rol_id' =>$role->id,
            'timetable_id'=>$timetable->id,
        ]);
    
        $tracking=Tracking::create([
            'signature'=>'',
            'user_id' => $user->id,
            'datetime_start' =>  now(),
            'datetime_end' => now(),
            'num_hours'=>'4',
        ]);
        $this->assertEquals($tracking->user_id,$user->id);
        $tracking->delete();
        $user->delete();
        $timetable->delete();
        $role->delete();
    }
}
