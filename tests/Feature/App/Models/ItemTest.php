<?php

namespace Tests\Feature\App\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Carbon\Carbon;

use App\Models\Classroom;
use App\Models\Item;
use App\Models\User;
use App\Models\Type;
use App\Models\State;
use App\Models\Role;
use App\Models\Timetable;

class ItemTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function testUsers()
    // {
       
    //     $classroom = Classroom::create([
    //         'name' => '1000',
    //         'number' => 1000,
    //         'created_at' => now(),
    //         'updated_at' => now()
    //     ]);

    //     $state = State::create([
    //         'name' => 'Roto',
    //         'created_at' => now(),
    //         'updated_at' => now()
    //     ]);

    //     $type = Type::create([
    //         'name' => 'alumno',
    //         'model' => 'defaultModel'
    //     ]);

    //     $item = Item::create([
    //         'name' => 'Portatil Asus',
    //         'number' => 2000,
    //         'date_pucharse' => Carbon::create('2020', '03', '30'),
    //         'classroom_id' => $classroom->id,
    //         'state_id' => $state->id,
    //         'type_id' => $type->id,
    //         'created_at' => now(),
    //         'updated_at' => now()
    //     ]);

    //     //CREACION USER
    //     $rol = Role::create([
    //         'name' => 'default',
    //         'slug'        => 'profesor prueba',
    //         'description' => 'Profesor Role',
    //         'created_at' => now(),
    //         'updated_at' => now()
    //     ]);

    //     $timetable = Timetable::create([
    //         'name' => '2ASIR2020',
    //         'date_start' =>  now(),
    //         'date_end' => now(),
    //         'created_at' => now(),
    //         'updated_at' => now(),
    //     ]);

    //     $user = User::create([
    //         'first_name' => 'user',
    //         'last_name' => 'user',
    //         'email' => 'user23424@campusaula.com',
    //         'password' => bcrypt('userPass'),
    //         'created_at' => now(),
    //         'updated_at' => now(),
    //         'role_id' => $rol->id,
    //         'timetable_id' => $timetable->id
    //     ]);

    //     $user2 = User::create([
    //         'first_name' => 'user223',
    //         'last_name' => 'user223',
    //         'email' => 'user23323@campusaula.com',
    //         'password' => bcrypt('user2Pass'),
    //         'created_at' => now(),
    //         'updated_at' => now(),
    //         'role_id' => $rol->id,
    //         'timetable_id' => $timetable->id
    //     ]);


    //     //Creacion de la tabla intermedia con los datos extra que no son los id
    //     $item->users()->attach($user, ['date_inicio' => Carbon::create('2019', '09', '16'), 'date_fin' => Carbon::create('2020', '06', '12')]);
    //     $item->users()->attach($user2, ['date_inicio' => Carbon::create('2018', '04', '16'), 'date_fin' => Carbon::create('2019', '06', '12')]);

    //     //Creamos un array de todos los id de los users creados en la DB
    //     $users = $item->users->pluck('id');

    //     //Array de Items recuperados    
    //     $expectedUsersIds = collect([
    //         ['id' => $user->id],
    //         ['id' => $user2->id]
    //     ])->pluck('id');

    //     $this->assertEquals($users, $expectedUsersIds);

    //     $item->users()->detach($user);
    //     $item->users()->detach($user2);


        
    //     $user->delete();
    //     $user2->delete();
    //     $rol->delete();
    //     $timetable->delete();
    //     $item->delete();
    //     $classroom->delete();
    //     $type->delete();
    //     $state->delete();
    // }
    public function testStates()
    {
       //CREACION state
        
       $state = State::create([
        'name' => 'Estado test prueba',
        'created_at' => now(),
        'updated_at' => now()
    ]);


        $classroom = Classroom::create([
            'name' => '1000',
            'number' => 1000,
            'created_at' => now(),
            'updated_at' => now()
        ]);


        $type = Type::create([
            'name' => 'alumno',
            'model' => 'defaultModel'
        ]);

        $item = Item::create([
            'name' => 'Portatil Asus',
            'number' => 2000,
            'date_pucharse' => Carbon::create('2020', '03', '30'),
            'classroom_id' => $classroom->id,
            'state_id' => $state->id,
            'type_id' => $type->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        

        //Creamos un array de todos los id de los states creados en la DB
        $states = $item->state->pluck('id');

        $this->assertEquals($states, $state->id);

        $item->delete();
        $classroom->delete();
        $type->delete();
        $state->delete();
    }
}
