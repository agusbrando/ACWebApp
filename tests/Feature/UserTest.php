<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Carbon\Carbon;

use App\Models\Type;
use App\Models\Classroom;
use App\Models\Session;
use App\Models\Event;
use App\Models\Item;
use App\Models\User;
use App\Models\Role;
use App\Models\State;
use App\Models\Timetable;


class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testItems()
    {
        //CREACION ITEM
        $classroom = Classroom::create([
            'name' => '6',
            'number' => 6,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $state = State::create([
            'name' => 'Roto',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $type = Type::create([
            'name' => 'alumno',
            'model' => 'defaultModel'
        ]);

        $item = Item::create([
            'name' => 'Portatil Asus',
            'date_pucharse' => Carbon::create('2020', '03', '30'),
            'classroom_id' => $classroom->id,
            'state_id' => $state->id,
            'type_id' => $type->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $item2 = Item::create([
            'name' => 'Portatil MSI',
            'date_pucharse' => Carbon::create('2020', '03', '30'),
            'classroom_id' => $classroom->id,
            'state_id' => $state->id,
            'type_id' => $type->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //CREACION USER
        $rol = Role::create([
            'name' => 'default',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $timetable = Timetable::create([
            'name' => '2ASIR2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $user = User::create([
            'first_name' => 'user',
            'last_name' => 'user',
            'email' => 'user23424@campusaula.com',
            'password' => bcrypt('userPass'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => $rol->id,
            'timetable_id' => $timetable->id
        ]);

        // $user2 = User::create([
        //     'first_name' => 'user223',
        //     'last_name' => 'user223',
        //     'email' => 'user23323@campusaula.com',
        //     'password' => bcrypt('user2Pass'),
        //     'created_at' => now(),
        //     'updated_at' => now(),
        //     'role_id' => $rol->id,
        //     'timetable_id' => $timetable->id
        // ]);


        //Creacion de la tabla intermedia con los datos extra que no son los id
        $user->items()->attach($item, ['date_inicio' => Carbon::create('2019', '09', '16'), 'date_fin' => Carbon::create('2020', '06', '12')]);
        $user->items()->attach($item2, ['date_inicio' => Carbon::create('2018', '04', '16'), 'date_fin' => Carbon::create('2019', '06', '12')]);

        //Array de Items recuperados
        $items = $user->items->pluck('id');

        $expectedItemsIds = collect([
            ['id' => $item->id],
            ['id' => $item2->id]
        ])->pluck('id');

        $this->assertEquals($items, $expectedItemsIds);

        $user->items()->detach($item);
        $user->items()->detach($item2);



        $user->delete();
        $rol->delete();
        $timetable->delete();
        $item->delete();
        $item2->delete();
        $classroom->delete();
        $type->delete();
        $state->delete();
    }
}
