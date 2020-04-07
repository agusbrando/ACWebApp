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

class TypeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testEvents()
    {
        // $role = Role::create([
        //     'name' => 'default',
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        
        // $type = Type::create([
        //      'name' => 'default',
        //      'model' => 'defaultModel'
        //  ]);

        // $classroom = Classroom::create([
        //     'name' => 'default',
        //     'number' => 1,
        // ]);

        // $session = Session::create([
        //     'classroom_id'=>$classroom->id,
        //     'time_start' => date('Y-m-d H:i:s'),
        //     'time_end' => date('Y-m-d H:i:s'),
        //     'model' => 'defaultModel'
        // ]);

        // $user = User::create([
        //     'first_name' => 'default',
        //     'last_name' => 'default',
        //     'email' => 'default@gmail.com',
        //     'password' => 'default',
        //     'role_id' => $role->id
        // ]);

        //  $evento = Event::create([
        //     'type_id' => $type->id,
        //     'session_id' => $session->id,
        //     'user_id' => $user->id,
        //     'description' => 'default',
        //     'date' => date("Y-m-d")
        //  ]);

        // $evento2 = Event::create([
        //     'type_id' => $type->id,
        //     'session_id' => $session->id,
        //     'user_id' => $user->id,
        //     'description' => 'default',
        //     'date' => date("Y-m-d")
        // ]);

        $type = Type::find(1);

        $evento = $type->events->pluck('id');

        $expected_events_ids = collect([
            ['id'=>1]
        ])->pluck('id');

        $this->assertEquals($evento,$expected_events_ids); 
              
        // $evento->delete();
        // $user->delete();
        // $session->delete();
        // $classroom->delete();
        // $type->delete();
        // $role->delete();
        }

    
}
