<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {

        $type = Types::create([
            'name' => 'default',
            'model' => 'defaultModel'
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

        $evento2 = Events::create([
            'types_id' => $type->id,
            'sessions_id' => $session->id,
            'users_id' => $user->id,
            'description' => 'default',
            'date' => date("Y-m-d")
        ]);

    }
}
