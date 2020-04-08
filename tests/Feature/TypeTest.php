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
use App\Models\Item;

class TypeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testEvent()
    {

        $role = Role::create([
            'name' => 'default',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $user = User::create([
            'first_name' => 'default',
            'last_name' => 'default',
            'email' => 'default@gmail.com',
            'password' => 'default',
            'role_id' => $role->id
        ]);    

        $type = Type::create([
            'name' => 'default',
            'model' => 'defaultModel'
        ]);
        
        $classroom = Classroom::create([
            'name' => 'default',
            'number' => 1,
        ]);

        $session = Session::create([
            'classroom_id'=>$classroom->id,
            'time_start' => date('Y-m-d H:i:s'),
            'time_end' => date('Y-m-d H:i:s'),
            'model' => 'defaultModel'
        ]);
        
        
        $event = Event::create([
            'type_id' => $type->id,
            'session_id' => $session->id,
            'user_id' => $user->id,
            'description' => 'default',
            'date' => date("Y-m-d")
        ]); 
        
        $event2 = Event::create([
            'type_id' => $type->id,
            'session_id' => $session->id,
            'user_id' => $user->id,
            'description' => 'default',
            'date' => date("Y-m-d")
        ]);

        
        $events = $type->events->pluck('id');

        $expected_events_ids = collect([
            ['id'=>$event->id],
            ['id'=>$event2->id]
        ])->pluck('id');

        $this->assertEquals($events,$expected_events_ids); 
        
        $event->destroy($event);
        $user->destroy($user);
        $session->destroy($session);
        $classroom->destroy($classroom);
        $type->destroy($type);
        $role->destroy($role); 

    }

    
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
