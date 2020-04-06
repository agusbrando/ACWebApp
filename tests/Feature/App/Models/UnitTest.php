<?php

namespace Tests\Feature\App\Models;
use App\Models\Unit;
use App\Models\Subject;
use App\Models\User;
use App\Models\Role;

use App\Models\Program;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UnitTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testProgram()
    {
        $subject = Subject::create([
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
            'role_id' => 2
        ]);
        $user_two_responsable = User::create([
            'first_name' => 'Profesor',
            'last_name' => 'Apellido Apellido',
            'email' => 'profesor.apellido2@campusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 3
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
        $unit = Unit::create([
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
       

        

        $expected_program_id = $unit->program_id;

        $program = $unit->program;
        $program_id = $program->id;

        $this->assertEquals($program_id,$expected_program_id);

        $unit->delete();
        $program_one->delete();
        $user_two_responsable->delete();
        $user_one_profesor->delete();
        $subject->delete();
    }
}
