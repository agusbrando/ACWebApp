<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Carbon\Carbon;

use App\Models\Item;
use App\Models\Type;

class TypeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testItem()
    {
        $type = Type::create([
            'model' => 'Item', 
            'name' => ' movil',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        $item1 = Item::create([
            'name' => 'Portatil Asus',
            'date_pucharse' => Carbon::create('2020','03','30'),
            'classroom_id' => 1,
            'state_id' => 2,
            'type_id' => $type->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $item2 = Item::create([
            'name' => 'Portatil MSI',
            'date_pucharse' => Carbon::create('2020','03','30'),
            'classroom_id' => 1,
            'state_id' => 2,
            'type_id' => $type->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        //Llamamos a la funcion items que tiene el Modelo type
        $items = $type->items->pluck('id');
        
        $expected_items_ids = collect([
            ['id' => $item1->id],
            ['id' => $item2->id]
        ])->pluck('id');

        $this->assertEquals($items, $expected_items_ids);

        $item2->delete();
        $item1->delete();
        $type->delete();

    }
}
