<?php

namespace Tests\Feature\App\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Role;
use App\Models\Classroom;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Session;
use App\Models\Timetable;
class TimetableTest extends TestCase
{
    
    public function testUsers()
    {
        $role = Role::create([
            'name' => 'Profesor',
            'slug'=> 'prueba test',
            'description' => 'Alumno Role',
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
        $user_one = User::create([
            'first_name' => 'Profesor',
            'last_name' => 'Apellido Apellido',
            'email' => 'profesor.apellido1@campusaula.com',
            'password' => bcrypt('password'),
            'signature'=>'',
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => $role->id,
            'timetable_id'=>$timetable->id
        ]);
        $user_two = User::create([
            'first_name' => 'Profesor',
            'last_name' => 'Apellido Apellido',
            'email' => 'profesor.apellido2@campusaula.com',
            'password' => bcrypt('password'),
            'signature'=>'',
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => $role->id,
            'timetable_id'=>$timetable->id
        ]);
        
            
            $users = $timetable->users->pluck('id');
            $expected_users_ids=collect([
                ['id' => $user_one->id],
                ['id' => $user_two->id],
           
            ])->pluck('id');


        $this->assertEquals($users,$expected_users_ids);
        $user_two->delete();
        $user_one->delete();
        $timetable->delete();
        $role->delete();
    }
    /*public function testSession()
    {
        $course = Course::create([
            'level' => 6,
            'name' => 'Tercero',
            'num_students' => 30
        ]);

        
        $timetable = Timetable::create([
            'name' => '2DAM2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
            
        $classroom = Classroom::create([
            'name' => 'default10',
            'number' => 7,
        ]);

        $session = Session::create([
            'classroom_id'=>$classroom->id,
            'time_start' => date('Y-m-d H:i:s'),
            'time_end' => date('Y-m-d H:i:s'),
            'model' => 'defaultModel'
        ]);
        $session2 = Session::create([
            'classroom_id'=>$classroom->id,
            'time_start' => date('Y-m-d H:i:s'),
            'time_end' => date('Y-m-d H:i:s'),
            'model' => 'defaultModel'
        ]);
        $session->sessionTimetables()->attach($timetable, ['subject_id'=>'1']);
        $session2->sessionTimetables()->attach($timetable, ['subject_id'=>'1']);

        
        
            $session_ids=$timetable()->session->pluck('id');
           
            $expected_session_ids=collect([
            ['id'=>$session->id],
            ['id'=>$session2->id],
            
           
            ])->pluck('id');
            
        $this->assertEquals($session_ids,$expected_session_ids);
        $session->sessionTimetables()->detach($timetable);
        $session->sessionTimetables()->detach($timetable);
        $session2->delete();
        $session->delete();
        $classroom->delete();
        $timetable->delete();
        
       
        
        
    }*/

    
}
