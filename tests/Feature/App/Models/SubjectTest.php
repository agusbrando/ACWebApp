<?php

namespace Tests\Feature\App\Models;

use App\Models\Subject;
use App\Models\Program;
use App\Models\Role;
use App\Models\User;
use App\Models\Course;
use App\Models\Timetable;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\DB;

class SubjectTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPrograms()
    {
        $course = Course::create([
            'level' => 2,
            'name' => 'Segundo',
            'num_students' => 19,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $timetable = Timetable::create([
            'name' => '2DAM2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $subject = Subject::create([
            'course_id'=> $course->id,
            'name' => 'Acceso a Datos',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $role = Role::create([
            'name' => 'Profesor',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $role_responsable = Role::create([
            'name' => 'Jefe de estudios',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $user_one_profesor = User::create([
            'first_name' => 'Profesor',
            'last_name' => 'Apellido Apellido',
            'email' => 'profesor.apellido1@campusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => $role->id,
            'timetable_id'=>$timetable->id
        ]);
        $user_two_responsable = User::create([
            'first_name' => 'Profesor',
            'last_name' => 'Apellido Apellido',
            'email' => 'profesor.apellido2@campusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => $role_responsable->id,
            'timetable_id'=>$timetable->id
        ]);
        $user_three_profesor = User::create([
            'first_name' => 'Profesor',
            'last_name' => 'Apellido Apellido',
            'email' => 'profesor.apellido3@campusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => $role->id,
            'timetable_id'=>$timetable->id
        ]);
        $program_one = Program::create([
            'date_check' => '2019-09-22',	
            'notes' => 'Muy bien estructurado',
            'subject_id' => $subject->id,
            'professor_id' => $user_one_profesor->id,
            'user_id' => $user_two_responsable->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $program_two = Program::create([
            'date_check' => '2019-09-22',	
            'notes' => 'Muy bien estructurado',
            'subject_id' => $subject->id,
            'professor_id' => $user_three_profesor->id,
            'user_id' => $user_two_responsable->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
       
        $programs_ids = $subject->programs->pluck('id');
        $expected_programs_ids = collect([
            ['id' => $program_one->id],
            ['id' => $program_two->id]
        ])->pluck('id');

        $this->assertEquals($programs_ids,$expected_programs_ids);

        $program_two->delete();
        $program_one->delete();
        $user_three_profesor->delete();
        $user_two_responsable->delete();
        $user_one_profesor->delete();
        $role_responsable->delete();
        $role->delete();
        $subject->delete();
        $timetable->delete();
        $course->delete();
    }
}
