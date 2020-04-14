<?php

namespace Tests\Feature\App\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Role;
use App\Models\Type;
use App\Models\Classroom;
use App\Models\Session;
use App\Models\User;
use App\Models\Event;
use App\Models\Timetable;

class EventTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testType()
    {
        $timetable = Timetable::create([
            'name' => '2DAM2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $role = Role::create([
            'name' => 'default',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $type = Type::create([
            'model' => 'ejemplo',
            'name' => 'ejemplo'
        ]);


        $classroom = Classroom::create([
            'name' => 'prueba',
            'number' => 5
        ]);

        $session = Session::create([
            'classroom_id'=>$classroom->id,
            'time_start' => date('Y-m-d H:i:s'),
            'time_end' => date('Y-m-d H:i:s'),
            'model' => 'defaultModel'
        ]);

        $user = User::create([
            'first_name' => 'Profesor',
            'last_name' => 'Apellido Apellido',
            'email' => 'profesor.apellido1@campusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => $role->id,
            'timetable_id'=>$timetable->id
        ]);

        $evento = Event::create([
            'type_id' => $type->id,
            'session_id' => $session->id,
            'user_id' => $user->id,
            'description' => 'default',
            'date' => date("Y-m-d")
        ]);

        $this->assertEquals($evento->type->id,$type->id);
        $evento->delete();
        $user->delete();
        $session->delete();
        $classroom->delete();
        $type->delete();
        $role->delete();
        $timetable->delete();

    }

    public function testSession()
    {
        $timetable = Timetable::create([
            'name' => '2DAM2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $role = Role::create([
            'name' => 'default',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $type = Type::create([
            'model' => 'ejemplo',
            'name' => 'ejemplo'
        ]);


        $classroom = Classroom::create([
            'name' => 'prueba',
            'number' => 5
        ]);

        $session = Session::create([
            'classroom_id'=>$classroom->id,
            'time_start' => date('Y-m-d H:i:s'),
            'time_end' => date('Y-m-d H:i:s'),
            'model' => 'defaultModel'
        ]);

        $user = User::create([
            'first_name' => 'Profesor',
            'last_name' => 'Apellido Apellido',
            'email' => 'profesor.apellido1@campusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => $role->id,
            'timetable_id'=>$timetable->id
        ]);

        $evento = Event::create([
            'type_id' => $type->id,
            'session_id' => $session->id,
            'user_id' => $user->id,
            'description' => 'default',
            'date' => date("Y-m-d")
        ]);

        $this->assertEquals($evento->session->id,$session->id);
        $evento->delete();
        $user->delete();
        $session->delete();
        $classroom->delete();
        $type->delete();
        $role->delete();
        $timetable->delete();

    }

    public function testUser()
    {
        $timetable = Timetable::create([
            'name' => '2DAM2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $role = Role::create([
            'name' => 'default',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $type = Type::create([
            'model' => 'ejemplo',
            'name' => 'ejemplo'
        ]);

        $classroom = Classroom::create([
            'name' => 'prueba',
            'number' => 5,
        ]);

        $session = Session::create([
            'classroom_id'=>$classroom->id,
            'time_start' => date('Y-m-d H:i:s'),
            'time_end' => date('Y-m-d H:i:s'),
            'model' => 'defaultModel'
        ]);

        $user = User::create([
            'first_name' => 'Profesor',
            'last_name' => 'Apellido Apellido',
            'email' => 'profesor.apellido1@campusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => $role->id,
            'timetable_id'=>$timetable->id
        ]);

        $evento = Event::create([
            'type_id' => $type->id,
            'session_id' => $session->id,
            'user_id' => $user->id,
            'description' => 'default',
            'date' => date("Y-m-d")
        ]);

        $this->assertEquals($evento->user->id,$user->id);
        $evento->delete();
        $user->delete();
        $session->delete();
        $classroom->delete();
        $type->delete();
        $role->delete();
        $timetable->delete();
    }
}
