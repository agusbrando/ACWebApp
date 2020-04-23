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
    public function testUsers()
    {
        $timetable = Timetable::create([
            'name' => '2DAM2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
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

        $role = Role::create([
            'name' => 'Alumno',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $user = User::create([
            'first_name' => 'user',
            'email' => 'usertesting@campusaula.com',
            'last_name' => 'user',
            'password' => bcrypt('userPass'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => $role->id,
            'timetable_id'=>$timetable->id
        ]);

        $user2 = User::create([
            'first_name' => 'user2',
            'email' => 'usertesting2@campusaula.com',
            'last_name' => 'user2',
            'password' => bcrypt('user2Pass'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' =>  $role->id,
            'timetable_id'=>$timetable->id
        ]);
        
        

        //Creacion de la tabla intermedia con los datos extra que no son los id
        $user->itemUser()->attach($itemuser, ['date_inicio' => Carbon::create('2019','09','16'),'date_fin' => Carbon::create('2020','06','12')]);
        $user2->itemUser()->attach($itemuser, ['date_inicio' => Carbon::create('2019','04','16'),'date_fin' => Carbon::create('2020','06','12')]);
        
        //Array de Items recuperados
        $users = $itemuser->users->pluck('id');

        $expectedUsersIds = collect([
            ['id'=> $user->id],
            ['id'=> $user2->id]
        ])->pluck('id');

        $this->assertEquals($users, $expectedUsersIds);

        $user->itemUser()->detach($itemuser);  
        $user2->itemUser()->detach($itemuser); 
        $user->delete();
        $user2->delete();
        $role->delete();
        $state->delete();
        $classroom->delete();     
        $timetable->delete();
        

    }
    //faltan los otros dos metodos
}
