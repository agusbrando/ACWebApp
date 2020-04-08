<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Role;
use App\Models\User;

use App\Models\Role;
use App\Models\Type;
use App\Models\Classroom;
use App\Models\Session;
use App\Models\User;
use App\Models\Event;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testEvent()
    {

        $role = Role::create([
            'name' => 'default',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $user = User::create([
            'first_name' => 'default',
            'last_name' => 'default',
            'email' => 'default@gmail.com',
            'password' => 'default',
            'role_id' => $role->id
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


        $event = Event::create([
            'type_id' => $type->id,
            'session_id' => $session->id,
            'user_id' => $user->id,
            'description' => 'default',
            'date' => date("Y-m-d")
        ]);


        $event2 = Event::create([
            'type_id' => $type->id,
            'session_id' => $session->id,
            'user_id' => $user->id,
            'description' => 'default',
            'date' => date("Y-m-d")
        ]);

        $events = $user->events->pluck('id');

        $expected_events_ids = collect([
            ['id'=>$event->id],
            ['id'=>$event2->id]
        ])->pluck('id');

        $this->assertEquals($events,$expected_events_ids); 

        $event->destroy($event);
        $user->destroy($user);
        $session->destroy($session);
        $classroom->destroy($classroom);
        $type->destroy($type);
        $role->destroy($role); 
        
    }  

    public function testRole()
    {
        $role = Role::create([
            'name' => 'Test',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $user = User::create([
            'first_name' => 'Pruebas',
            'last_name' => 'Tests',
            'email' => 'pruebas@campusaula.com',
            'password' => 'pruebas',
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => $role->id
        ]);

        $this->assertEquals($user->role->id,$role->id);
    }


}
