<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Carbon\Carbon;

use App\Models\ItemUser;
use App\Models\Item;
use App\Models\User;

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
            'name' => 'Portatil Lenovo',
            'date_pucharse' => Carbon::create('2020','03','30'),
            'classroom_id' => 1,
            'state_id' => 2,
            'type_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        $user = User::create([
            'first_name' => 'Sergio',
            'email' => 'Sergio@campusaula.com',
            'last_name' => 'Sergio',
            'password' => bcrypt('SergioPass'),
            'created_at' => now(),
            'updated_at' => now(),
            'rol_id' => 1
        ]);

        // $itemUser = ItemUser::create([
        //     'item_id' => $item->id,
        //     'user_id' => $user->id,
        //     'date_inicio' => Carbon::create('2019','09','16'),
        //     'date_fin' => Carbon::create('2020','06','12'),
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        

        // $this->assertEquals($itemUser->item_id, $item->id);
        // $this->assertEquals($itemUser->user_id, $user->id);

        $item->itemUser()->attach($itemuser, ['date_inicio' => Carbon::create('2019','09','16')]);
        $item->itemUser()->attach($itemuser, ['date_fin' => Carbon::create('2020','06','12')]);
        
            

        //Elimina los opjetos creados de la BD
        ItemUser::destroy($itemUser->item_id);
        // $itemUser->delete();
        $item->delete();
        $user->delete();
    }
}
