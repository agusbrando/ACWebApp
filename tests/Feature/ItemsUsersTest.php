<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Carbon\Carbon;

use app\Models\ItemUser;
use app\Models\Item;
use app\Models\User;

class ItemsUsersTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        
        $item = Item::create([
            'name' => 'Portatil HP',
            'date_pucharse' => Carbon::create('2020','03','30'),
            'classroom_id' => 1,
            'state_id' => 2,
            'type_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        $user = User::create([
            'first_name' => 'Admin',
            'email' => 'admin@campusaula.com',
            'last_name' => 'Admin',
            'password' => bcrypt('adminPass'),
            'created_at' => now(),
            'updated_at' => now(),
            'rol_id' => 1
        ]);

        $itemUser = ItemUser::create([
            'item_id' => $item->id,
            'user_id' => $user->id,
            'date_inicio' => Carbon::create('2019','09','16'),
            'date_fin' => Carbon::create('2020','06','12'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        

        $this->assertEquals($itemUser->item_id, $item->id);
        $this->assertEquals($itemUser->user_id, $user->id);


        //Elimina los opjetos creados de la BD
        $itemUser->delete();
        $item->delete();
        $user->delete();
    }
}
