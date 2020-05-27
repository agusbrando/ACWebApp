<?php

namespace Tests\Feature\App\Models;

use App\Models\Classroom;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;
use App\Models\Evaluation;
use App\Models\Course;
use App\Models\Subject;
use App\Models\YearUnion;
use App\Models\Year;
use App\Models\YearUnionUser;
use App\Models\Type;
use App\Models\Timetable;
use App\Models\User;
use App\Models\Calification;
use App\Models\Role;


class TaskTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCalification()
    {
        $subject = Subject::create([
            'name' => 'AsignaturaEjemplo',
            'abbreviation' => 'ASEG',
            "hours" => 256,
            'color' => '#aaffaa'
        ]);

        $course = Course::create([
            'level' => 2,
            'name' => 'CourseEjemplo',
            'abbreviation' => 'CE',
            'num_students' => 30,
        ]);

        $evaluation = Evaluation::create([
            'name' => '1Eval'
        ]);

        $year = Year::create([
            'name' => '2022/2024',
            'date_start' => now(),
            'date_end' => now()
        ]);

        $classroom = Classroom::create([
            'name' => 'Clase',
            'number' => 35,
        ]);

        $yearUnion = YearUnion::create([
            'subject_id' => $subject->id,
            'course_id' => $course->id,
            'evaluation_id' => $evaluation->id,
            'year_id' => $year->id,
            'date_start' => now(),
            'date_end' => now(),
            'classroom_id' => $classroom->id
        ]);

        $role = Role::create([
            'name' => 'Test',
            'slug' => 'test',
            'description' => 'test role'
        ]);

        $timetable = Timetable::create([
            'name' => 'testCE2022',
            'date_start' =>  now(),
            'date_end' => now()
        ]);

        $user = User::create([
            'first_name' => 'UserTest',
            'last_name' => 'UserTest',
            'email' => 'UserTest.lopez@champusaula.com',
            'password' => bcrypt('password'),
            'role_id' => $role->id,
            'timetable_id' => $timetable->id
        ]);

        $type = Type::create([
            'name' => 'TypeTest',
            'model' => 'App\Models\Task'
        ]);

        $task = Task::create([
            'year_union_id' => $yearUnion->id,
            'name' => 'Examen1',
            'type_id' => $type->id
        ]);

        $yearUnionUser = YearUnionUser::create([
            'year_union_id' => $yearUnion->id,
            'user_id' => $user->id,
            'assistance' => true
        ]);

        $task->yearUnionUsers()->attach($yearUnionUser->id, ['value' => 10]);

        $califications = $task->yearUnionUsers;

        $expected_yearUnionUsers_ids = collect([
            ['id' => $task->id]
        ])->pluck('id');

        $this->assertEquals($califications, $expected_yearUnionUsers_ids);

    }

    public function testUsers()
    {

        $course = Course::create([
            'level' => 1,
            'name' => 'Primero',
            'num_students' => 30
        ]);

        $subject = Subject::create([
            'course_id' => $course->id,
            'name' => 'Ejemplo2'
        ]);

        $evaluation = Evaluation::create([
            'subject_id' => $subject->id,
            'name' => '1Eval'
        ]);

        $task = Task::create([
            'evaluation_id' => $evaluation->id,
            'name' => 'Practica 1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //role id y timetable id
        $user = User::create([
            'first_name' => 'Admin',
            'email' => 'ejemplo@campusaula.com',
            'last_name' => 'Admin',
            'password' => bcrypt('adminPass'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 1,
            'timetable_id' => 1
        ]);
        $user2 = User::create([
            'first_name' => 'Alumno',
            'last_name' => 'Apellido',
            'email' => 'ejemplo2@campusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 4,
            'timetable_id' => 1
        ]);

        $user->tasks()->attach($task, ['value' => 10]);
        $user2->tasks()->attach($task, ['value' => 20]);

        $users = $task->users->pluck('id');

        $expected_users_ids = collect([
            ['id' => $user->id],
            ['id' => $user2->id]
        ])->pluck('id');

        $this->assertEquals($users, $expected_users_ids);

        $user->tasks()->detach($task);
        $user2->tasks()->detach($task);
        $task->delete();
        $evaluation->delete();
        $subject->delete();
        $course->delete();
    }
}
