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

class ClassroomTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSessions()
    {
        $classroom = Classroom::find(1);

        $session = $classroom->sessions->pluck('id');

        $expected_sessions_ids = collect([
            ['id'=>1]
        ])->pluck('id');

        $this->assertEquals($session,$expected_sessions_ids); 

    }
}
