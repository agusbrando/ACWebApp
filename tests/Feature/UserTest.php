<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Timetable;
use App\Models\Role;
use App\Models\Type;
use App\Models\Classroom;
use App\Models\Session;
use App\Models\User;
use App\Models\Event;
use App\Models\Timetable;
use App\Models\Task;
use App\Models\Evaluation;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Calification;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testEvent()
    {

        $role = Role::create([
            'name' => 'default',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $user = User::create([
            'first_name' => 'default',
            'last_name' => 'default',
            'email' => 'default@gmail.com',
            'password' => 'default',
            'role_id' => $role->id
        ]);

        $type = Type::create([
            'name' => 'default',
            'model' => 'defaultModel'
        ]);

        $classroom = Classroom::create([
            'name' => 'default',
            'number' => 1,
        ]);

        $session = Session::create([
            'classroom_id'=>$classroom->id,
            'time_start' => date('Y-m-d H:i:s'),
            'time_end' => date('Y-m-d H:i:s'),
            'model' => 'defaultModel'
        ]);


        $event = Event::create([
            'type_id' => $type->id,
            'session_id' => $session->id,
            'user_id' => $user->id,
            'description' => 'default',
            'date' => date("Y-m-d")
        ]);


        $event2 = Event::create([
            'type_id' => $type->id,
            'session_id' => $session->id,
            'user_id' => $user->id,
            'description' => 'default',
            'date' => date("Y-m-d")
        ]);

        $events = $user->events->pluck('id');

        $expected_events_ids = collect([
            ['id'=>$event->id],
            ['id'=>$event2->id]
        ])->pluck('id');

        $this->assertEquals($events,$expected_events_ids); 

        $event->destroy($event);
        $user->destroy($user);
        $session->destroy($session);
        $classroom->destroy($classroom);
        $type->destroy($type);
        $role->destroy($role); 
        
    }  
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
            'name' => 'Prueba1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $user = User::create([
            'first_name' => 'Admin',
            'email' => 'prueba1@campusaula.com',
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
            'name' => 'Ejemplo1'
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

        $tarea1->users()->attach($user, ['value'=>6]);
        $tarea2->users()->attach($user, ['value'=>10]);

        $tasks = $user->tasks->pluck('id');
        
        $expected_tasks_ids = collect([
            ['id' => $tarea1->id],
            ['id' => $tarea2->id]
        ])->pluck('id');

        $this->assertEquals($tasks, $expected_tasks_ids);

        $tarea1->users()->detach($user);
        $tarea2->users()->detach($user);
        $tarea1->delete();
        $tarea2->delete();
        $evaluation->delete();
        $subject->delete();
        $course->delete();
        $user->delete();
        $role->delete();
        $timetable->delete();
        
    }


}
