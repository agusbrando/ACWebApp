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


}
