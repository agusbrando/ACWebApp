<?php

namespace Tests\Feature\App\Models;
use App\Models\Subject;
use App\Models\Program;
use App\Models\Role;
use App\Models\User;
use App\Models\Unit;
use App\Models\Evaluable;
use App\Models\Evaluated;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\Timetable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProgramTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /**@test prueba de la relacion subject, devuelve la asignatura del programa en cuestion */
    public function testSubject()
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
        $program_one = Program::create([
            'date_check' => '2019-09-22',	
            'notes' => 'Muy bien estructurado',
            'subject_id' => $subject->id,
            'professor_id' => $user_one_profesor->id,
            'user_id' => $user_two_responsable->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        


        $expected_subject_id = $program_one->subject_id;

        $subject = $program_one->subject;//uso la relacion a probar
        $subject_id = $subject->id;

        $this->assertEquals($subject_id,$expected_subject_id);

        $program_one->delete();
        $user_two_responsable->delete();
        $user_one_profesor->delete();
        $role_responsable->delete();
        $role->delete();
        $subject->delete();
        $timetable->delete();
        $course->delete();
    }
    /**@test prueba de la relacion responsable, devuelve el usuario responsable del programa en cuestion */
    public function testResponsable()
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
        $program_one = Program::create([
            'date_check' => '2019-09-22',	
            'notes' => 'Muy bien estructurado',
            'subject_id' => $subject->id,
            'professor_id' => $user_one_profesor->id,
            'user_id' => $user_two_responsable->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
       
        $expected_user_id = $program_one->user_id;

        $user = $program_one->responsable;//uso la relacion a probar
        $user_id = $user->id;

        $this->assertEquals($user_id,$expected_user_id);

        $program_one->delete();
        $user_two_responsable->delete();
        $user_one_profesor->delete();
        $role_responsable->delete();
        $role->delete();
        $subject->delete();
        $timetable->delete();
        $course->delete();
    }
    /**@test prueba de la relacion responsable, devuelve el profesor que planifica el programa*/
    public function testProfessor()
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
        $program_one = Program::create([
            'date_check' => '2019-09-22',	
            'notes' => 'Muy bien estructurado',
            'subject_id' => $subject->id,
            'professor_id' => $user_one_profesor->id,
            'user_id' => $user_two_responsable->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

       

        $expected_user_id = $program_one->professor_id;

        $user = $program_one->professor;//uso la relacion a probar
        $user_id = $user->id;

        $this->assertEquals($user_id,$expected_user_id);

        $program_one->delete();
        $user_two_responsable->delete();
        $user_one_profesor->delete();
        $role_responsable->delete();
        $role->delete();
        $subject->delete();
        $timetable->delete();
        $course->delete();
    }
    /**@test lista de programas en los que ese usuario es responsable*/
    public function testUnits(){
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
            'role_id' => 2,
            'timetable_id'=>$timetable->id
        ]);
        $user_two_responsable = User::create([
            'first_name' => 'Profesor',
            'last_name' => 'Apellido Apellido',
            'email' => 'profesor.apellido2@campusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 3,
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
        $unit_one = Unit::create([
            'program_id' => $program_one->id,
            'expected_date_start' => '2019-09-12',	
            'expected_date_end' => '2019-09-12',	
            'date_start' => '2019-09-12',	
            'date_end' => '2019-09-12',	
            'expected_eval' => '1EVAL',
            'eval' => '1EVAL',
            'notes' => 'Observaciones de la unidad 0',
            'improvements' => 'Mejoras de la unidad 0 para el futuro',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $unit_two = Unit::create([
            'program_id' => $program_one->id,
            'expected_date_start' => '2019-09-13',	
            'expected_date_end' => '2019-09-27',	
            'date_start' => '2019-09-13',	
            'date_end' => '2019-09-19',	
            'expected_eval' => '1EVAL',
            'eval' => '1EVAL',
            'notes' => 'Observaciones de la unidad 1',
            'improvements' => 'Mejoras de la unidad 1 para el futuro',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        

        $units_ids = $program_one->units->pluck('id');//uso la relacion a probar
        $expected_units_ids = collect([
            ['id' => $unit_one->id],
            ['id' => $unit_two->id]
        ])->pluck('id');

        $this->assertEquals($units_ids,$expected_units_ids);

        $unit_two->delete();
        $unit_one->delete();
        $program_one->delete();
        $user_two_responsable->delete();
        $user_one_profesor->delete();
        $role_responsable->delete();
        $role->delete();
        $subject->delete();
        $timetable->delete();
        $course->delete();
    }
    /**@test lista de aspectos evaluados en esa programacion*/
    public function testEvaluables()
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
        $evaluable_one = Evaluable::create([
            'name' => 'La metodología didáctica aplicada',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $evaluable_two = Evaluable::create([
            'name' => 'Los criterios de evaluación',
            'created_at' => now(),
            'updated_at' => now()
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
        $program_one = Program::create([
            'date_check' => '2019-09-22',	
            'notes' => 'Muy bien estructurado',
            'subject_id' => $subject->id,
            'professor_id' => $user_one_profesor->id,
            'user_id' => $user_two_responsable->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $evaluated_one = Evaluated::create([
            'evaluable_id' => $evaluable_one->id,
            'program_id' => $program_one->id,
            'description' => 'Nada que destacar',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $evaluated_two = Evaluated::create([
            'evaluable_id' => $evaluable_two->id,
            'program_id' => $program_one->id,
            'description' => 'Nada que destacar',
            'created_at' => now(),
            'updated_at' => now()
        ]);
       
        $evaluables_ids = $program_one->evaluables->pluck('id');

        $expected_evaluables_ids = collect([
            ['id' => $evaluable_one->id],
            ['id' => $evaluable_two->id]
        ])->pluck('id'); 

        $this->assertEquals($evaluables_ids,$expected_evaluables_ids);
        
        Evaluated::destroy($evaluated_one->id, $evaluated_two->id);
        $program_one->delete();
        $user_two_responsable->delete();
        $user_one_profesor->delete();
        $role_responsable->delete();
        $role->delete();
        $subject->delete();
        $evaluable_one->delete();
        $evaluable_two->delete();
        $timetable->delete();
        $course->delete();
    }
}
