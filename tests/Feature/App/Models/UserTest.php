<?php

namespace Tests\Feature\App\Models;
use App\Models\Rol;
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

        $expected_rol_id = $user->rol_id;

        $rol = $user->rol;
        $rol_id = $rol->id;

        $this->assertEquals($rol_id,$expected_rol_id);
        
    }
    public function testProgramsProfessor(){

        $user_id = 1;
        $user = User::findorfail($user_id);

        $programs_ids = $user->programs_professor->pluck('id');
        $expected_programs_ids = DB::table('programs')->where('professor_id',$user_id)->pluck('id');

        $this->assertEquals($programs_ids,$expected_programs_ids);

    }
}
