<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Role;
use App\Models\Type;
use App\Models\Classroom;
use App\Models\Session;
use App\Models\User;
use App\Models\Event;

class EventTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testType()
    {

        $role = Role::create([
            'name' => 'default',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $type = Type::create([
            'name' => 'default',
            'model' => 'defaultModel'
        ]);

        $classroom = Classroom::create([
            'name' => 'default',
            'number' => 1,
        ]);

        $session = Session::create([
            'classroom_id'=>$classroom->id,
            'time_start' => date('Y-m-d H:i:s'),
            'time_end' => date('Y-m-d H:i:s'),
            'model' => 'defaultModel'
        ]);

        $user = User::create([
            'first_name' => 'default',
            'last_name' => 'default',
            'email' => 'default@gmail.com',
            'password' => 'default',
            'role_id' => $role->id
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

    }

    public function testSession()
    {

        $role = Role::create([
            'name' => 'default',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $type = Type::create([
            'name' => 'default',
            'model' => 'defaultModel'
        ]);

        $classroom = Classroom::create([
            'name' => 'default',
            'number' => 1,
        ]);

        $session = Session::create([
            'classroom_id'=>$classroom->id,
            'time_start' => date('Y-m-d H:i:s'),
            'time_end' => date('Y-m-d H:i:s'),
            'model' => 'defaultModel'
        ]);

        $user = User::create([
            'first_name' => 'default',
            'last_name' => 'default',
            'email' => 'default@gmail.com',
            'password' => 'default',
            'role_id' => $role->id
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

    }

    public function testUser()
    {

        $role = Role::create([
            'name' => 'default',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $type = Type::create([
            'name' => 'default',
            'model' => 'defaultModel'
        ]);

        $classroom = Classroom::create([
            'name' => 'default',
            'number' => 1,
        ]);

        $session = Session::create([
            'classroom_id'=>$classroom->id,
            'time_start' => date('Y-m-d H:i:s'),
            'time_end' => date('Y-m-d H:i:s'),
            'model' => 'defaultModel'
        ]);

        $user = User::create([
            'first_name' => 'default',
            'last_name' => 'default',
            'email' => 'default@gmail.com',
            'password' => 'default',
            'role_id' => $role->id
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

    }
}
