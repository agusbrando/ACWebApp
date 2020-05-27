<?php

namespace Tests\Feature;

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

class YearUnionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testEvaluation()
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

        $evaluacion = $yearUnion->evaluation;

        $this->assertEquals($evaluacion->id, $evaluation->id);

        //     $yearUnion->delete();
        //     $classroom->delete();
        //     $year->delete();
        //     $course->delete();
        //     $evaluation->delete();
        //     $subject->delete();

    }

    public function testTasks()
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

        $type = Type::create([
            'name' => 'TypeTest',
            'model' => 'App\Models\Task'
        ]);

        $task = Task::create([
            'year_union_id' => $yearUnion->id,
            'name' => 'Examen1',
            'type_id' => $type->id
        ]);

        $task2 = Task::create([
            'year_union_id' => $yearUnion->id,
            'name' => 'Examen1',
            'type_id' => $type->id
        ]);

        $tasks = $yearUnion->tasks->pluck('id');

        $expected_tasjs_ids = collect([
            ['id' => $task->id],
            ['id' => $task2->id]
        ])->pluck('id');

        $this->assertEquals($tasks, $expected_tasjs_ids);

        //     $task->delete();
        //     $task2->delete();
        //     $type->delete();
        //     $yearUnion->delete();
        //     $classroom->delete();
        //     $year->delete();
        //     $course->delete();
        //     $evaluation->delete();
        //     $subject->delete();
    }

    public function testUsers()
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

        $user2 = User::create([
            'first_name' => 'UserTest',
            'last_name' => 'UserTest',
            'email' => 'UserTest2.lopez@champusaula.com',
            'password' => bcrypt('password'),
            'role_id' => $role->id,
            'timetable_id' => $timetable->id
        ]);

        $yearUnion->users()->attach($user->id, ['assistance' => true]);
        $yearUnion->users()->attach($user2->id, ['assistance' => true]);

        $users = $yearUnion->users->pluck('id');

        $expected_users_ids = collect([
            ['id' => $user->id],
            ['id' => $user2->id]
        ])->pluck('id');

        $this->assertEquals($users, $expected_users_ids);
        
    //     $user->delete();
    //     $user2->delete();
    //     $timetable->delete();
    //     $role->delete();
    //     $yearUnion->delete();
    //     $classroom->delete();
    //     $year->delete();
    //     $course->delete();
    //     $evaluation->delete();
    //     $subject->delete();
    // }
}
