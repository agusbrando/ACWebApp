<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Carbon\Carbon;

use App\Models\State;

class StatesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $state = State::create([
            'name' => 'Roto',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // $this->assertEquals($item->state_id, $state->id);

        // $state->delete();
    }
}
