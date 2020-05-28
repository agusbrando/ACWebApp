<?php

namespace Tests\Feature\App\Models;

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
use App\Models\Classroom;
use App\Models\Role;


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
    public function testCourse()
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

        $course = $subject->course;

        $this->assertEquals($subject->course, $course);

    }

    /**@test */
    public function testEvaluation()
    {
        $course = Course::create([
            'level' => 1,
            'name' => 'Primero',
            'num_students' => 30
        ]);

        $subject = Subject::create([
            'course_id' => $course->id,
            'name' => 'Ejemplo6'
        ]);

         $evaluation = Evaluation::create([
             'subject_id' => $subject->id,
             'name' => '1Eval'
         ]);

         $evaluation2 = Evaluation::create([
            'subject_id' => $subject->id,
            'name' => '2Eval'
        ]);

        $evaluations = $subject->evaluations->pluck('id');
        
        $expected_evaluations_ids = collect([
            ['id' => $evaluation->id],
            ['id' => $evaluation2->id]
        ])->pluck('id');

        $this->assertEquals($evaluations, $expected_evaluations_ids);

        $evaluation->delete();
        $evaluation2->delete();
        $subject->delete();
        $course->delete();
        
    }
}
