<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Role;
use App\Models\Timetable;
use App\Models\Task;
use App\Models\Evaluation;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Calification;

class UserTest extends TestCase
{
    
    public function testRole()
    {

        $timetable = Timetable::create([
            'name' => '2DAM2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $role = Role::create([
            'name' => 'Prueba2',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $user = User::create([
            'first_name' => 'Admin',
            'email' => 'prueba2@campusaula.com',
            'last_name' => 'Admin',
            'password' => bcrypt('adminPass'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => $role->id,
            'timetable_id'=>$timetable->id,
        ]);
        
        $role = Role::find($user->role_id);

        $this->assertEquals($user->role, $role);

        $user->delete();
        $role->delete();
        $timetable->delete();
    }

    public function testTimetable(){

        $timetable = Timetable::create([
            'name' => '2DAM2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $role = Role::create([
            'name' => 'Prueba2',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $user = User::create([
            'first_name' => 'Admin',
            'email' => 'prueba2@campusaula.com',
            'last_name' => 'Admin',
            'password' => bcrypt('adminPass'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => $role->id,
            'timetable_id'=>$timetable->id,
        ]);

        $timetable = Timetable::find($user->timetable_id);

        $this->assertEquals($user->timetable, $timetable);

        $user->delete();
        $role->delete();
        $timetable->delete();
    }

    public function testCalifications()
    {

        $timetable = Timetable::create([
            'name' => '2DAM2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $role = Role::create([
            'name' => 'Prueba11',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $user = User::create([
            'first_name' => 'Admin',
            'email' => 'prueba11@campusaula.com',
            'last_name' => 'Admin',
            'password' => bcrypt('adminPass'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => $role->id,
            'timetable_id'=>$timetable->id,
        ]);

        $course = Course::create([
            'level' => 1,
            'name' => 'Primero',
            'num_students' => 30
        ]);

        $subject = Subject::create([
            'course_id' => $course->id,
            'name' => 'Ejemplo11'
        ]);

        $evaluation = Evaluation::create([
             'subject_id' => $subject->id,
             'name' => '1Eval'
        ]);

        $tarea1 = Task::create([
            'evaluation_id' => $evaluation->id,
            'name' => 'Practica 1'
        ]);

        $tarea2 = Task::create([
            'evaluation_id' => $evaluation->id,
            'name' => 'Practica 1'
        ]);

        $califications = Calification::create([
            'task_id' => $tarea1->id,
            'user_id' => $tarea2->id,
            'value' => 12
        ]);

        $tasks = $user->tasks->pluck('id');
        
        $expected_tasks_ids = collect([
            ['id' => $tarea1->id],
            ['id' => $tarea2->id]
        ])->pluck('id');

        $this->assertEquals($tasks, $expected_tasks_ids);

        $user->delete();
        $role->delete();
        $timetable->delete();
        $califications->delete();
        $tarea1->delete();
        $tarea2->delete();
        $evaluation->delete();
        $subject->delete();
        $course->delete();
        
        
        
        
    }

    
}
