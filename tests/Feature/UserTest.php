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
        // $roleC = Role::create([
        //     'id' => '1',
        //     'name' => 'Administrador',
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);

        // $user = User::create([
        //     'id' => '1',
        //     'first_name' => 'Admin',
        //     'email' => 'admin@campusaula.com',
        //     'last_name' => 'Admin',
        //     'password' => bcrypt('adminPass'),
        //     'created_at' => now(),
        //     'updated_at' => now(),
        //     'role_id' => 1,
        //     'timetable_id'=>1,
        // ]);

        $user = User::find(3);
        
        $role = Role::find($user->role_id);

        $this->assertEquals($user->role, $role);
    }

    public function testTimetable(){

        // $timetable = Timetable::create([
        //     'id' = > '1',
        //     'name' => '2DAM2020',
        //     'date_start' =>  now(),
        //     'date_end' => now(),
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // $user = User::create([
        //     'id' => '1',
        //     'first_name' => 'Admin',
        //     'email' => 'admin@campusaula.com',
        //     'last_name' => 'Admin',
        //     'password' => bcrypt('adminPass'),
        //     'created_at' => now(),
        //     'updated_at' => now(),
        //     'role_id' => 1,
        //     'timetable_id'=>1,
        // ]);

        $user = User::find(2);
        $timetable = Timetable::find($user->timetable_id);

        $this->assertEquals($user->timetable, $timetable);
    }
}
