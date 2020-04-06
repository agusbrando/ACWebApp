<?php

namespace Tests\Feature\App\Models;
use App\Models\Role;
use App\Models\User;
use App\Models\Program;
use App\Models\Subject;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRol()
    {

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
            'role_id' => $role->id
        ]);
        $user_two_responsable = User::create([
            'first_name' => 'Profesor',
            'last_name' => 'Apellido Apellido',
            'email' => 'profesor.apellido2@campusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => $role_responsable->id
        ]);
        
        $role_id = $user_one_profesor->role->id;
       

        $expected_role_id = $user_one_profesor->role_id;

        $this->assertEquals($role_id,$expected_role_id);

        $user_two_responsable->delete();
        $user_one_profesor->delete();
        $role->delete();
        $role_responsable->delete();
    }
    /**@test lista de programas en los que ese usuario es profesor*/
    public function testProgramsProfessor(){

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
            'role_id' => $role->id
        ]);
        $user_two_responsable = User::create([
            'first_name' => 'Profesor',
            'last_name' => 'Apellido Apellido',
            'email' => 'profesor.apellido2@campusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => $role_responsable->id
        ]);
        $subject_one = Subject::create([
            'name' => 'PMM',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $subject_two = Subject::create([
            'name' => 'DI',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $program_one = Program::create([
            'date_check' => '2019-09-22',	
            'notes' => 'Muy bien estructurado',
            'subject_id' =>$subject_one->id,
            'professor_id' => $user_one_profesor->id,
            'user_id' => $user_two_responsable->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $program_two = Program::create([
            'date_check' => '2019-09-22',	
            'notes' => 'Muy bien estructurado',
            'subject_id' =>$subject_two ->id,
            'professor_id' => $user_one_profesor->id,
            'user_id' => $user_two_responsable->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        

        $programs_ids = $user_one_profesor->programs_professor->pluck('id');
        $expected_programs_ids = collect([
            ['id' => $program_one->id],
            ['id' => $program_two->id]
        ])->pluck('id');


        $this->assertEquals($programs_ids,$expected_programs_ids);
        
        $program_two->delete();
        $program_one->delete();
        $subject_two->delete();
        $subject_one->delete();
        $user_two_responsable->delete();
        $user_one_profesor->delete();
        $role_responsable->delete();
        $role->delete();

    }
    /**@test lista de programas en los que ese usuario es responsable*/
    public function testProgramsResponsable(){

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
            'role_id' => $role->id
        ]);
        $user_two_responsable = User::create([
            'first_name' => 'Profesor',
            'last_name' => 'Apellido Apellido',
            'email' => 'profesor.apellido2@campusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => $role_responsable->id
        ]);
        $subject_one = Subject::create([
            'name' => 'PMM',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $subject_two = Subject::create([
            'name' => 'DI',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $program_one = Program::create([
            'date_check' => '2019-09-22',	
            'notes' => 'Muy bien estructurado',
            'subject_id' =>$subject_one->id,
            'professor_id' => $user_one_profesor->id,
            'user_id' => $user_two_responsable->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $program_two = Program::create([
            'date_check' => '2019-09-22',	
            'notes' => 'Muy bien estructurado',
            'subject_id' =>$subject_two->id,
            'professor_id' => $user_one_profesor->id,
            'user_id' => $user_two_responsable->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $programs_ids = $user_two_responsable->programs_responsable->pluck('id');
        $expected_programs_ids = collect([
            ['id' => $program_one->id],
            ['id' => $program_two->id]
        ])->pluck('id');

        $this->assertEquals($programs_ids,$expected_programs_ids);

        $program_two->delete();
        $program_one->delete();
        $subject_two->delete();
        $subject_one->delete();
        $user_two_responsable->delete();
        $user_one_profesor->delete();
        $role_responsable->delete();
        $role->delete();

    }
    
}
