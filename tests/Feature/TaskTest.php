<?php

namespace Tests\Feature\App\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;
use App\Models\Evaluation;
use App\Models\Course;
use App\Models\Subject;

class TaskTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testEvaluation()
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
            //find 
        $evaluation = Evaluation::find($task->evaluation_id);

        $this->assertEquals($task->evaluation->name, $evaluation->name);

        $task->delete();
        $evaluation->delete();
        $subject->delete();
        $course->delete();
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
            'timetable_id'=>1
        ]);
        $user2 = User::create([
            'first_name' => 'Alumno',
            'last_name' => 'Apellido',
            'email' => 'ejemplo2@campusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 4,
            'timetable_id'=>1
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
