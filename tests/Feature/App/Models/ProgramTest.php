<?php

namespace Tests\Feature\App\Models;
use App\Models\Program;
use Illuminate\Support\Facades\DB;

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
        $program_id=1;
        $program = Program::findorfail($program_id);

        $expected_subject_id = $program->subject_id;

        $subject = $program->subject;//uso la relacion a probar
        $subject_id = $subject->id;

        $this->assertEquals($subject_id,$expected_subject_id);
    }
    /**@test prueba de la relacion responsable, devuelve el usuario responsable del programa en cuestion */
    public function testResponsable()
    {
        $program_id=1;
        $program = Program::findorfail($program_id);

        $expected_user_id = $program->user_id;

        $user = $program->responsable;//uso la relacion a probar
        $user_id = $user->id;

        $this->assertEquals($user_id,$expected_user_id);
    }
    /**@test prueba de la relacion responsable, devuelve el profesor que planifica el programa*/
    public function testProfessor()
    {
        $program_id=1;
        $program = Program::findorfail($program_id);

        $expected_user_id = $program->professor_id;

        $user = $program->professor;//uso la relacion a probar
        $user_id = $user->id;

        $this->assertEquals($user_id,$expected_user_id);
    }
    /**@test lista de programas en los que ese usuario es responsable*/
    public function testUnits(){

        $program_id=1;
        $program = Program::findorfail($program_id);

        $units_ids = $program->units->pluck('id');//uso la relacion a probar
        $expected_units_ids = DB::table('units')->where('program_id',$program_id)->pluck('id');

        $this->assertEquals($units_ids,$expected_units_ids);
    }
    /**@test lista de aspectos evaluados en esa programacion*/
    public function testEvaluateds()
    {
        $id=1;
        $evaluables = Program::findorfail($id)->evaluateds->pluck('id');

        $expected_evaluables = DB::table('evaluateds')->where('program_id', $id)->pluck('evaluable_id');
        $this->assertEquals($evaluables,$expected_evaluables);

    }
}
