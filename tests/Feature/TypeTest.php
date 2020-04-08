<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Carbon\Carbon;

use App\Models\Item;
use App\Models\Type;

use App\Models\Type;
class TypeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $type = Type::create([
            'model' => 'Item', 
            'name' => ' movil',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $item = Item::create([
            'name' => 'Portatil Asus',
            'date_pucharse' => Carbon::create('2020','03','30'),
            'classroom_id' => $classroom->id,
            'state_id' => $state->id,
            'type_id' => $type->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);


        $this->assertEquals($item->type_id, $type->id);

        // $type->delete();

    }
}
