<?php

namespace Tests\Feature\App\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Carbon\Carbon;

use App\Models\Classroom;
use App\Models\Course;
use App\Models\Evaluation;
use App\Models\Item;
use App\Models\User;
use App\Models\Type;
use App\Models\State;
use App\Models\Role;
use App\Models\Subject;
use App\Models\Timetable;
use App\Models\Year;
use App\Models\YearUnion;
use App\Models\YearUnionUser;

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


        //Creamos un array de todos los id de los states creados en la DB
        $items = $state->items->pluck('id');

        $expectedItemIds = collect([
            ['id' => $item1->id],
            ['id' => $item2->id]
        ])->pluck('id');

        $this->assertEquals($items, $expectedItemIds);

        $item1->forceDelete();
        $item2->forceDelete();
        $classroom->delete();
        $type->delete();
        $state->delete();
    }

    // public function testYearUnionUser()
    // {
    //     //CREACION Year Union
    //     $subject = Subject::create([
    //         'name' => 'AsignaturaEjemplo',
    //         'abbreviation' => 'ASEG',
    //         "hours" => 256,
    //         'color' => '#aaffaa'
    //     ]);

    //     $course = Course::create([
    //         'level' => 2,
    //         'name' => 'CourseEjemplo',
    //         'abbreviation' => 'CE',
    //         'num_students' => 30,
    //     ]);


    //     $evaluation = Evaluation::create([
    //         'name' => '1Eval'
    //     ]);

    //     $year = Year::create([
    //         'name' => '2022/2024',
    //         'date_start' => now(),
    //         'date_end' => now()
    //     ]);

    //     $classroom1 = Classroom::create([
    //         'name' => 'Clase',
    //         'number' => 35,
    //     ]);

    //     $yearUnion = YearUnion::create([
    //         'subject_id' => $subject->id,
    //         'course_id' => $course->id,
    //         'evaluation_id' => $evaluation->id,
    //         'year_id' => $year->id,
    //         'date_start' => now(),
    //         'date_end' => now(),
    //         'classroom_id' => $classroom1->id
    //     ]);

    //     //Creacion User
    //     $role = Role::create([
    //         'name' => 'Test',
    //         'slug' => 'test',
    //         'description' => 'test role'
    //     ]);

    //     $timetable = Timetable::create([
    //         'name' => 'testCE2022',
    //         'date_start' =>  now(),
    //         'date_end' => now()
    //     ]);

    //     $user = User::create([
    //         'first_name' => 'UserTest',
    //         'last_name' => 'UserTest',
    //         'email' => 'UserTest.test@champusaula.com',
    //         'password' => bcrypt('password'),
    //         'role_id' => $role->id,
    //         'timetable_id' => $timetable->id
    //     ]);

    //     $user2 = User::create([
    //         'first_name' => 'UserTest2',
    //         'last_name' => 'UserTest2',
    //         'email' => 'UserTest2.test@champusaula.com',
    //         'password' => bcrypt('password'),
    //         'role_id' => $role->id,
    //         'timetable_id' => $timetable->id
    //     ]);

    //     //Creacion Year_Union_User
    //     $yearUnion->users()->attach($user->id, ['assistance' => true]);
    //     $yearUnion->users()->attach($user2->id, ['assistance' => true]);

    //     //CREACION Items

    //     $state = State::create([
    //         'name' => 'Estado test prueba',
    //         'created_at' => now(),
    //         'updated_at' => now()
    //     ]);

    //     $classroom2 = Classroom::create([
    //         'name' => '1000',
    //         'number' => 1000,
    //         'created_at' => now(),
    //         'updated_at' => now()
    //     ]);

    //     $type = Type::create([
    //         'name' => 'alumno',
    //         'model' => 'defaultModel'
    //     ]);

    //     $item = Item::create([
    //         'name' => 'Portatil Asus1',
    //         'number' => 2000,
    //         'date_pucharse' => Carbon::create('2020', '03', '30'),
    //         'classroom_id' => $classroom2->id,
    //         'state_id' => $state->id,
    //         'type_id' => $type->id,
    //         'created_at' => now(),
    //         'updated_at' => now()
    //     ]);

        
    //     $yearUnionUsers = $yearUnion->users;

    //     foreach ($yearUnionUsers as $yearUnionUser) {
    //         //indicamos la tabla intermedia
    //         $item->yearUnionUsers()->attach($yearUnionUser->pivot->id, );
    //     }


    //     //Creamos un array de todos los id de los states creados en la DB
    //     $yearUnionUsers = $item->yearUnionUsers->pluck('id');

    //     $expectedYearUnionUserIds = collect([
    //         ['id' => $yearUnionUsers[0]->id],
    //         ['id' => $yearUnionUsers[1]->id]
    //     ])->pluck('id');

    //     $this->assertEquals($yearUnionUsers, $expectedYearUnionUserIds);
    //     //eliminamos los objetos de la BD


        
    //     $yearUnion->forceDelete();
    //     $classroom1->delete();
    //     $year->delete();
    //     $course->delete();
    //     $evaluation->delete();
    //     $subject->delete();

    //     $user->forceDelete();

    //     $item->forceDelete();
    //     $classroom2->delete();
    //     $type->delete();
    //     $state->delete();
    // }

    public function testClassroom()
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


        //Creamos un array de todos los id de los states creados en la DB
        $items = $classroom->items->pluck('id');

        $expectedItemIds = collect([
            ['id' => $item1->id],
            ['id' => $item2->id]
        ])->pluck('id');

        $this->assertEquals($items, $expectedItemIds);

        $item1->forceDelete();
        $item2->forceDelete();
        $classroom->delete();
        $type->delete();
        $state->delete();
    }
}
