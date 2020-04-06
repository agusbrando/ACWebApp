<?php

namespace Tests\Feature\App\Models;
use App\Models\Role;
use App\Models\User;

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

        $user_id=1;
        $user = User::findorfail($user_id);

        $expected_role_id = $user->role_id;

        $role = $user->role;
        $role_id = $role->id;

        $this->assertEquals($role_id,$expected_role_id);
        
    }
    /**@test lista de programas en los que ese usuario es profesor*/
    public function testProgramsProfessor(){

        $user_id = 1;
        $user = User::findorfail($user_id);

        $programs_ids = $user->programs_professor->pluck('id');
        $expected_programs_ids = DB::table('programs')->where('professor_id',$user_id)->pluck('id');

        $this->assertEquals($programs_ids,$expected_programs_ids);

    }
    /**@test lista de programas en los que ese usuario es responsable*/
    public function testProgramsResponsable(){

        $user_id = 1;
        $user = User::findorfail($user_id);

        $programs_ids = $user->programs_responsable->pluck('id');
        $expected_programs_ids = DB::table('programs')->where('user_id',$user_id)->pluck('id');

        $this->assertEquals($programs_ids,$expected_programs_ids);
    }
}
