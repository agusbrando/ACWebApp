<?php

namespace Tests\Feature\App\Models;

use App\Models\Role;
use App\Models\User;
use App\Models\Timetable;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\DB;

class RoleTest extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */

    /**@test */
    public function testUsers(){
        $timetable = Timetable::create([
            'name' => '2DAM2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $role = Role::create([
            'name' => 'Profesor',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $user_one = User::create([
            'first_name' => 'Profesor',
            'last_name' => 'Apellido Apellido',
            'email' => 'profesor.apellido1@campusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => $role->id,
            'timetable_id'=>$timetable->id
        ]);
        $user_two = User::create([
            'first_name' => 'Profesor',
            'last_name' => 'Apellido Apellido',
            'email' => 'profesor.apellido2@campusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => $role->id,
            'timetable_id'=>$timetable->id
        ]);
        $role_id=$role->id;
        $users_ids = $role->users->pluck('id');

        $expected_users_ids = collect([
            ['id' => $user_one->id],
            ['id' => $user_two->id]
        ])->pluck('id');

        $this->assertEquals($users_ids,$expected_users_ids);

        $user_one->delete();
        $user_two->delete();
        $role->delete();
        $timetable->delete();

    }
}
