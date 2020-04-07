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
        $type = Type::find(1);

        $evento = $type->events->pluck('id');

        $expected_events_ids = collect([
            ['id'=>1]
        ])->pluck('id');

        $this->assertEquals($evento,$expected_events_ids); 
      
        }

    
}
