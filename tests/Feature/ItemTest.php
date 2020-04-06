<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ItemTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $classroom = Classroom::create([
            'name' => 'Taller',
            'number' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $state = State::create([
            'name' => 'Averiado',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $type = Type::create([
            'model' => 'Item', 
            'name' => 'Teclado',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $Item = Item::create([
            'name' => 'Portatil HP',
            'date_pucharse' => Carbon::create('2020','03','30'),
            'classroom_id' => $classroom->id,
            'state_id' => $state->id,
            'type_id' => $type->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        $this->assertEquals($Item->classroom_id, $classroom->id);
        $this->assertEquals($Item->state_id, $state->id);
        $this->assertEquals($Item->type_id, $type->id);
    }
}
