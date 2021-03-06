<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Role;
use App\Models\State;
use App\Models\Type;
use App\Models\Classroom;
use App\Models\Session;
use App\Models\User;
use App\Models\Event;
use Carbon\Carbon;
use App\Models\Item;



class ClassroomTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function testSession()
    // {
    //     $role = Role::create([
    //         'name' => 'default',
    //         'created_at' => now(),
    //         'updated_at' => now()
    //     ]);

    //     $user = User::create([
    //         'first_name' => 'default',
    //         'last_name' => 'default',
    //         'email' => 'default@gmail.com',
    //         'password' => 'default',
    //         'role_id' => $role->id
    //     ]);

    //     $type = Type::create([
    //         'name' => 'default',
    //         'model' => 'defaultModel'
    //     ]);

    //     $classroom = Classroom::create([
    //         'name' => 'default',
    //         'number' => 1,
    //     ]);

    //     $session = Session::create([
    //         'classroom_id'=>$classroom->id,
    //         'time_start' => date('Y-m-d H:i:s'),
    //         'time_end' => date('Y-m-d H:i:s'),
    //         'model' => 'defaultModel'
    //     ]);

    //     $session2 = Session::create([
    //         'classroom_id'=>$classroom->id,
    //         'time_start' => date('Y-m-d H:i:s'),
    //         'time_end' => date('Y-m-d H:i:s'),
    //         'model' => 'defaultModel'
    //     ]);


    //     $event = Event::create([
    //         'type_id' => $type->id,
    //         'session_id' => $session->id,
    //         'user_id' => $user->id,
    //         'description' => 'default',
    //         'date' => date("Y-m-d")
    //     ]);

    //     $sessions = $classroom->sessions->pluck('id');

    //     $expected_sessions_ids = collect([
    //         ['id'=>$session->id],
    //         ['id'=>$session2->id]
    //     ])->pluck('id');

    //     $this->assertEquals($sessions, $expected_sessions_ids);
    //     $event->destroy($event);
    //     $user->destroy($user);
    //     $session->destroy($session);
    //     $classroom->destroy($classroom);
    //     $type->destroy($type);

    //     $role->destroy($role);
    // }



    public function testItem()
    {
        $classroom = Classroom::create([
            'name' => 'Aula_5',
            'number' => 5000,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $state = State::create([
            'name' => 'Roto',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $type = Type::create([
            'model' => 'Item', 
            'name' => ' movil',
            'created_at' => now(),
            'updated_at' => now()
        ]);
      

        $item1 = Item::create([
            'name' => 'Portatil Asus1',
            'number' => 2000,
            'date_pucharse' => Carbon::create('2020', '03', '30'),
            'classroom_id' => $classroom->id,
            'state_id' => $state->id,
            'type_id' => $type->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $item2 = Item::create([
            'name' => 'Portatil Asus 2',
            'number' => 3000,
            'date_pucharse' => Carbon::create('2020', '03', '30'),
            'classroom_id' => $classroom->id,
            'state_id' => $state->id,
            'type_id' => $type->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        //Llamamos a la funcion items que tiene el Modelo classroom    
        $items = $classroom->items->pluck('id');
        
        $expected_items_ids = collect([
            ['id' => $item1->id],
            ['id' => $item2->id]
        ])->pluck('id');

        $this->assertEquals($items, $expected_items_ids);

        $item2->forceDelete();
        $item1->forceDelete();
        $classroom->delete();
    }
}
