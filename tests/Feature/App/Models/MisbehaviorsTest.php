<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Misbehavior;
use App\Models\Role;
use App\Models\Session;
use App\Models\SessionTimetable;
use App\Models\Type;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Timetable;
use App\Models\Classroom;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;


class MisbehaviorsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUser()
    {
        $role = Role::create([
            'name' => 'Alumno',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $timeTable = Timetable::create([
            'name' => '2DAM2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $user = User::create([
            'first_name' => 'Alberto',
            'last_name' => 'Ferrer',
            'role_id' => $role->id,
            'timetable_id' => $timeTable->id,
            'password' => bcrypt('password'),
            'email' => 'alumno.apellido1@campusaula.com',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $type = Type::create([
            'model' => 'defaultModel',
            'name' => 'prueba'
        ]);
        $course = Course::create([
            'level' => 2,
            'name' => 'Primero',
            'num_students' => 30
        ]);
        $subject = Subject::create([
            'course_id' => $course->id,
            'name' => 'Ejemplo5'
        ]);
        $classroom = Classroom::create([
            'name' => 'default',
            'number' => 1,
        ]);
        $session = Session::create([
            'classroom_id' => $classroom->id,
            'time_start' => now(),
            'time_end' => now(),
            'model' => 'prueba',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $sessionTimeTable = SessionTimetable::create([
            'session_id' => $session->id,
            'timetable_id' => $timeTable->id,
            'subject_id' => $subject->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $misbehavior = Misbehavior::create([
            'description' => 'Retraso',
            'type_id' => $type->id,
            'user_id' => $user->id,
            'session_timetable_id' => $sessionTimeTable->id,
            'date' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $expectedUserId = $misbehavior->user->id;

        $this->assertEquals($expectedUserId, $user->id);

        $misbehavior->delete();
        $sessionTimeTable->delete();
        $session->delete();
        $classroom->delete();
        $subject->delete();
        $course->delete();
        $type->delete();
        $user->delete();
        $timeTable->delete();
        $role->delete();
    }
    public function testType()
    {
        $role = Role::create([
            'name' => 'Alumno',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $timeTable = Timetable::create([
            'name' => '2DAM2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $user = User::create([
            'first_name' => 'Alberto',
            'last_name' => 'Ferrer',
            'role_id' => $role->id,
            'timetable_id' => $timeTable->id,
            'password' => bcrypt('password'),
            'email' => 'alumno.apellido3@campusaula.com',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $type = Type::create([
            'model' => 'defaultModel',
            'name' => 'prueba'
        ]);
        $course = Course::create([
            'level' => 2,
            'name' => 'Primero',
            'num_students' => 30
        ]);
        $subject = Subject::create([
            'course_id' => $course->id,
            'name' => 'Ejemplo5'
        ]);
        $classroom = Classroom::create([
            'name' => 'default',
            'number' => 2,
        ]);
        $session = Session::create([
            'classroom_id' => $classroom->id,
            'time_end' => now(),
            'model' => 'prueba',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $sessionTimeTable = SessionTimetable::create([
            'session_id' => $session->id,
            'timetable_id' => $timeTable->id,
            'subject_id' => $subject->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $misbehavior = Misbehavior::create([
            'description' => 'Retraso',
            'type_id' => $type->id,
            'user_id' => $user->id,
            'session_timetable_id' => $sessionTimeTable->id,
            'date' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $expectedTypeId = $misbehavior->type->id;
        $this->assertEquals($expectedTypeId, $type->id);

        $misbehavior->delete();
        $sessionTimeTable->delete();
        $session->delete();
        $classroom->delete();
        $subject->delete();
        $course->delete();
        $type->delete();
        $user->delete();
        $timeTable->delete();
        $role->delete();
    }
    public function testTSessionTimetable()
    {
        $role = Role::create([
            'name' => 'Alumno',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $timeTable = Timetable::create([
            'name' => '2DAM2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $user = User::create([
            'first_name' => 'Alberto',
            'last_name' => 'Ferrer',
            'role_id' => $role->id,
            'timetable_id' => $timeTable->id,
            'password' => bcrypt('password'),
            'email' => 'alumno.apellido2@campusaula.com',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $type = Type::create([
            'model' => 'defaultModel',
            'name' => 'prueba'
        ]);
        $course = Course::create([
            'level' => 2,
            'name' => 'Primero',
            'num_students' => 30
        ]);
        $subject = Subject::create([
            'course_id' => $course->id,
            'name' => 'Ejemplo5'
        ]);
        $classroom = Classroom::create([
            'name' => 'default',
            'number' => 3,
        ]);
        $session = Session::create([
            'classroom_id' => $classroom->id,
            'time_end' => now(),
            'model' => 'prueba',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $sessionTimeTable = SessionTimetable::create([
            'session_id' => $session->id,
            'timetable_id' => $timeTable->id,
            'subject_id' => $subject->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $misbehavior = Misbehavior::create([
            'description' => 'Retraso',
            'type_id' => $type->id,
            'user_id' => $user->id,
            'session_timetable_id'->$sessionTimeTable->id,
            'date' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $session_timetableid = $misbehavior->sessionTimeTable->id;

        $expected_sessionTimeTable_id = $sessionTimeTable->id;

        $this->assertEquals($session_timetableid, $expected_sessionTimeTable_id);

        $misbehavior->delete();
        $sessionTimeTable->delete();
        $session->delete();
        $classroom->delete();
        $subject->delete();
        $course->delete();
        $type->delete();
        $user->delete();
        $timeTable->delete();
        $role->delete();
    }
}
