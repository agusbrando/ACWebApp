<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Role;
use App\Models\Timetable;

class UserTest extends TestCase
{
    
    public function testRole()
    {

        $timetable = Timetable::create([
            'name' => '2DAM2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $role = Role::create([
            'name' => 'Prueba2',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $user = User::create([
            'first_name' => 'Admin',
            'email' => 'prueba2@campusaula.com',
            'last_name' => 'Admin',
            'password' => bcrypt('adminPass'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => $role->id,
            'timetable_id'=>$timetable->id,
        ]);
        
        $role = Role::find($user->role_id);

        $this->assertEquals($user->role, $role);

        $user->delete();
        $role->delete();
        $timetable->delete();
    }

    public function testTimetable(){

        $timetable = Timetable::create([
            'name' => '2DAM2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $role = Role::create([
            'name' => 'Prueba2',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $user = User::create([
            'first_name' => 'Admin',
            'email' => 'prueba2@campusaula.com',
            'last_name' => 'Admin',
            'password' => bcrypt('adminPass'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => $role->id,
            'timetable_id'=>$timetable->id,
        ]);

        $timetable = Timetable::find($user->timetable_id);

        $this->assertEquals($user->timetable, $timetable);

        $user->delete();
        $role->delete();
        $timetable->delete();
    }

    public function testCalifications()
    {

    }

    
}
