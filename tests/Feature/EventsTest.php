<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use app\Models\TypesModel;

class EventsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testType()
    {

        $type = Types::create([
            'name' => 'default',
            'model' => 'defaultModel'
        ]);

        $classroom = Classroom::create([
            'name' => 'default',
            'number' => 1,
        ]);

        $session = Sessions::create([
            'classroom_id'=>$classroom->id,
            'time_start' => date('Y-m-d H:i:s'),
            'time_end' => date('Y-m-d H:i:s'),
            'model' => 'defaultModel'
        ]);

        $user = Users::create([
            'first_name' => 'default',
            'last_name' => 'default',
            'email' => Str::random(10).'@gmail.com',
            'password' => Str::random(10),
            'rol_id' => 1
        ]);

        $evento = Events::create([
            'types_id' => $type->id,
            'sessions_id' => $session->id,
            'users_id' => $user->id,
            'description' => 'default',
            'date' => date("Y-m-d")
        ]);

        $this->assertEquals($evento->type,$type);

    }

    public function testSession()
    {

        $type = Types::create([
            'name' => 'default',
            'model' => 'defaultModel'
        ]);

        $classroom = Classroom::create([
            'name' => 'default',
            'number' => 1,
        ]);

        $session = Sessions::create([
            'classroom_id'=>$classroom->id,
            'time_start' => date('Y-m-d H:i:s'),
            'time_end' => date('Y-m-d H:i:s'),
            'model' => 'defaultModel'
        ]);

        $user = Users::create([
            'first_name' => 'default',
            'last_name' => 'default',
            'email' => Str::random(10).'@gmail.com',
            'password' => Str::random(10),
            'rol_id' => 1
        ]);

        $evento = Events::create([
            'types_id' => $type->id,
            'sessions_id' => $session->id,
            'users_id' => $user->id,
            'description' => 'default',
            'date' => date("Y-m-d")
        ]);

        $this->assertEquals($evento->session,$session);

    }

    public function testUser()
    {

        $type = Types::create([
            'name' => 'default',
            'model' => 'defaultModel'
        ]);

        $classroom = Classroom::create([
            'name' => 'default',
            'number' => 1,
        ]);

        $session = Sessions::create([
            'classroom_id'=>$classroom->id,
            'time_start' => date('Y-m-d H:i:s'),
            'time_end' => date('Y-m-d H:i:s'),
            'model' => 'defaultModel'
        ]);

        $user = Users::create([
            'first_name' => 'default',
            'last_name' => 'default',
            'email' => Str::random(10).'@gmail.com',
            'password' => Str::random(10),
            'rol_id' => 1
        ]);

        $evento = Events::create([
            'types_id' => $type->id,
            'sessions_id' => $session->id,
            'users_id' => $user->id,
            'description' => 'default',
            'date' => date("Y-m-d")
        ]);

        $this->assertEquals($evento->user,$user);

    }
}
