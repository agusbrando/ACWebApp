<?php

namespace Tests\Feature\App\Models;
use Illuminate\Support\Facades\DB;
use App\Models\Evaluable;
use App\Models\Program;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EvaluableTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPrograms()
    {
        $id=1;
        $programs = Evaluable::findorfail($id)->programs->pluck('id');

        $expected_programs = DB::table('evaluateds')->where('evaluable_id', $id)->pluck('program_id');
        $this->assertEquals($programs,$expected_programs);

    }
}
