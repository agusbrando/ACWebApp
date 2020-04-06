<?php

namespace Tests\Feature\App\Models;

use App\Models\Subject;
use App\Models\Program;

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
    
       $programs = Subject::findorfail(3)->programs->pluck('id');

        $expected_programs = DB::table('programs')->where('subject_id', 3)->pluck('id');
        $this->assertEquals($programs,$expected_programs);
    }
}
