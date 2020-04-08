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
use App\Models\Timeable;
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

        $user = User::create([
            'first_name' => 'Alberto',
            'last_name' => 'Ferrer',
            'rol_id' => $role->id,
            'password' => bcrypt('password'),
            'email' => 'alumno.apellido1@campusaula.com',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $type = Type::create([
            'model' => 'defaultModel',
            'name' => 'default'
        ]);

        $misbehavior = Misbehavior::create([
            'description' => 'Retraso',
            'type_id' => $type->id,
            'user_id' => $user->id,
            'date' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $expectedUserId = $misbehavior->user->id;

        $this->assertEquals($expectedUserId, $user->id);

        $misbehavior->delete();
        $type->delete();
        $user->delete();
        $role->delete();
    }
    public function testType()
    {
        $role = Role::create([
            'name' => 'Alumno',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $user = User::create([
            'first_name' => 'Alberto',
            'last_name' => 'Ferrer',
            'rol_id' => $role->id,
            'password' => bcrypt('password'),
            'email' => 'alumno.apellido1@campusaula.com',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $type = Type::create([
            'model' => 'defaultModel',
            'name' => 'default'
        ]);

        $misbehavior = Misbehavior::create([
            'description' => 'Retraso',
            'type_id' => $type->id,
            'user_id' => $user->id,
            'date' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $expectedTypeId = $misbehavior->type->id;
        $this->assertEquals($expectedTypeId, $type->id);

        $misbehavior->delete();
        $type->delete();
        $user->delete();
        $role->delete();
    }
    public function testTSessionTimetable()
    {
        $role = Role::create([
            'name' => 'Alumno',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $user = User::create([
            'first_name' => 'Alberto',
            'last_name' => 'Ferrer',
            'rol_id' => $role->id,
            'password' => bcrypt('password'),
            'email' => 'alumno.apellido2@campusaula.com',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $type = Type::create([
            'model' => 'defaultModel',
            'name' => 'default'
        ]);

        $misbehavior = Misbehavior::create([
            'description' => 'Retraso',
            'type_id' => $type->id,
            'user_id' => $user->id,
            'date' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $session = Session::create([
            'time_start' => now(),
            'time_end' => now(),
            'model' => 'prueba',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $timeTable = Timeable::create([
            'name' => '2DAM2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
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

        $sessionTimeTable = SessionTimetable::create([
            'session_id' => $session->id,
            'timetable_id' => $timeTable->id,
            'subject_id' => $subject->id
        ]);

        $sessionTimeTable->misbehaviors()->attach($misbehavior);
        $session = $misbehavior->sessionTimeTables->pluck('id');

        $expected_sessionTimeTable_ids = collect([
            ['id' => $sessionTimeTable->id]
        ]) -> pluck('id');

        $this->assertEquals($session, $expected_sessionTimeTable_ids);
            
        $sessionTimeTable->misbehavior()->detach($misbehavior);
        $sessionTimeTable->delete();
        $subject->delete();
        $course->delete();
        $timeTable->delete();
        $session->delete();
        $misbehavior->delete();
        $type->delete();
        $user->delete();
        $role->delete();
    }
}
