<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class userTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $item = Item::create([
            'name' => 'Portatil Asus',
            'date_pucharse' => Carbon::create('2020','03','30'),
            'classroom_id' => $classroom->id,
            'state_id' => $state->id,
            'type_id' => $type->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $item2 = Item::create([
            'name' => 'Portatil MSI',
            'date_pucharse' => Carbon::create('2020','02','30'),
            'classroom_id' => $classroom->id,
            'state_id' => $state->id,
            'type_id' => $type->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        $this->assertEquals($item->classroom_id, $classroom->id);
        $this->assertEquals($item->state_id, $state->id);
        $this->assertEquals($item->type_id, $type->id);

        //Creacion de la tabla intermedia con los datos extra que no son los id
        $item->itemUser()->attach($itemuser, ['date_inicio' => Carbon::create('2019','09','16'),'date_fin' => Carbon::create('2020','06','12')]);
        $item2->itemUser()->attach($itemuser, ['date_inicio' => Carbon::create('2019','04','16'),'date_fin' => Carbon::create('2020','06','12')]);
        
        //Array de Items recuperados
        $items = $itemuser->items->pluck('id');

        $expectedUsersIds = collect([
            ['id'=> $item->id],
            ['id'=> $item2->id]
        ])->pluck('id');

        $this->assertEquals($items, $expectedUsersIds);

        $item->itemUser()->detach($itemuser);  
        $item2->itemUser()->detach($itemuser); 
    }
}
