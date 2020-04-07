<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ItemsUsersTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        
        $Item = Item::create([
            'name' => 'Portatil HP',
            'date_pucharse' => Carbon::create('2020','03','30'),
            'classroom_id' => 1,
            'state_id' => 2,
            'type_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        $User = User::create([
            'first_name' => 'Admin',
            'email' => 'admin@campusaula.com',
            'last_name' => 'Admin',
            'password' => bcrypt('adminPass'),
            'created_at' => now(),
            'updated_at' => now(),
            'rol_id' => 1
        ]);

        $ItemUser = ItemUser::create([
            'item_id' => $Item->id,
            'user_id' => $User->id,
            'date_inicio' => Carbon::create('2019','09','16'),
            'date_fin' => Carbon::create('2020','06','12'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        

        //Aqui compara los id
        $this->assertEquals($ItemUser->item_id, $Item->id);
        $this->assertEquals($ItemUser->user_id, $User->id);
    }
}
