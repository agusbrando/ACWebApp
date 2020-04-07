<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Carbon\Carbon;

use app\Models\Item;
use app\Models\Type;

class TypesTest extends TestCase
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
            'name' => 'Teclado',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $item = Item::create([
            'name' => 'Portatil HP',
            'date_pucharse' => Carbon::create('2020','03','30'),
            'classroom_id' => 1,
            'state_id' => 2,
            'type_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        //Aqui compara los id
        $this->assertEquals($item->type_id, $type->id);


        $item->delete();
        $type->delete();

    }
}
