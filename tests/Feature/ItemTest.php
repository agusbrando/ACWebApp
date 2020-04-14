<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Carbon\Carbon;

use App\Models\Classroom;
use App\Models\Item;
use App\Models\User;
use App\Models\Type;
use App\Models\Role;
use App\Models\State;
use App\Models\Timetable;

class ItemTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function testExample()
    // {

    //     $classroom = Classroom::create([
    //         'name' => '6',
    //         'number' => 6,
    //         'created_at' => now(),
    //         'updated_at' => now()
    //     ]);

    //     $state = State::create([
    //         'name' => 'Roto',
    //         'created_at' => now(),
    //         'updated_at' => now()
    //     ]);
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
    //     $timetable = Timetable::create([
    //         'name' => '2ASIR2020',
    //         'date_start' =>  now(),
    //         'date_end' => now(),
    //         'created_at' => now(),
    //         'updated_at' => now(),
    //     ]);

    //     $user = User::create([
    //         'first_name' => 'user',
    //         'email' => 'user@campusaula.com',
    //         'last_name' => 'user',
    //         'password' => bcrypt('userPass'),
    //         'created_at' => now(),
    //         'updated_at' => now(),
    //         'rol_id' => $role->id,
    //         'timetable' => $timetable->id
    //     ]);

    //     $user2 = User::create([
    //         'first_name' => 'user2',
    //         'email' => 'user2@campusaula.com',
    //         'last_name' => 'user2',
    //         'password' => bcrypt('user2Pass'),
    //         'created_at' => now(),
    //         'updated_at' => now(),
    //         'rol_id' => $role->id,
    //         'timetable' => $timetable->id
    //     ]);
        
        

    //     //Creacion de la tabla intermedia con los datos extra que no son los id
    //     $user->itemUser()->attach($itemuser, ['date_inicio' => Carbon::create('2019','09','16'),'date_fin' => Carbon::create('2020','06','12')]);
    //     $user2->itemUser()->attach($itemuser, ['date_inicio' => Carbon::create('2019','04','16'),'date_fin' => Carbon::create('2020','06','12')]);
        
    //     //Array de Items recuperados
    //     $users = $itemuser->users->pluck('id');

    //     $expectedUsersIds = collect([
    //         ['id'=> $user->id],
    //         ['id'=> $user2->id]
    //     ])->pluck('id');

    //     $this->assertEquals($users, $expectedUsersIds);

    //     $user->itemUser()->detach($itemuser);  
    //     $user2->itemUser()->detach($itemuser);      

        

    // }
    public function testItemUser()
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

        $item1 = Item::create([
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
            'date_pucharse' => Carbon::create('2020','03','30'),
            'classroom_id' => $classroom->id,
            'state_id' => $state->id,
            'type_id' => $type->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //CREACION USER
        $role = Role::create([
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
            'email' => 'user@campusaula.com',
            'password' => bcrypt('userPass'),
            'created_at' => now(),
            'updated_at' => now(),
            'rol_id' => $role->id,
            'timetable' => $timetable->id
        ]);

        $user2 = User::create([
            'first_name' => 'user2',
            'last_name' => 'user2',
            'email' => 'user2@campusaula.com',
            'password' => bcrypt('user2Pass'),
            'created_at' => now(),
            'updated_at' => now(),
            'rol_id' => $role->id,
            'timetable' => $timetable->id
        ]);
        
        //CREACION itemUser
        $itemUser = User::create([
            'item_id' => $item1->id,
            'user_id' => $user->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $itemUser2 = User::create([
            'item_id' => $item1->id,
            'user_id' => $user->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //Creacion de la tabla intermedia con los datos extra que no son los id
        $user->responsables()->attach($itemUser, ['date_inicio' => Carbon::create('2019','09','16'),'date_fin' => Carbon::create('2020','06','12')]);
        $user2->responsables()->attach($itemUser2, ['date_inicio' => Carbon::create('2018','04','16'),'date_fin' => Carbon::create('2019','06','12')]);
        
        //Array de Items recuperados
        $users = $itemUser->users->pluck('id');

        $expectedUsersIds = collect([
            ['id'=> $user->id],
            ['id'=> $user2->id]
        ])->pluck('id');

        $this->assertEquals($users, $expectedUsersIds);

        $user->itemUser()->detach($itemUser);  
        $user2->itemUser()->detach($itemUser);     


        $itemUser->delete();
        $itemUser2->delete();
        $User->delete();
        $User2->delete();
        $rol->delete();
        $timetable->delete();
        $item->delete();
        $item2->delete();
        $classroom->delete();
        $type->delete();
        $state->delete();
    }
}
