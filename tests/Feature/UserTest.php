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
    public function testEvents()
    {
        $user = User::find(1);

        $events = $user->events->pluck('id');

        $expected_events_ids = collect([
            ['id'=>1]
        ])->pluck('id');

        $this->assertEquals($events,$expected_events_ids); 

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
