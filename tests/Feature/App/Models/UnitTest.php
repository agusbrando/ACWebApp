<?php

namespace Tests\Feature\App\Models;
use App\Models\Unit;
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
        $unit_id=1;
        $unit = Unit::findorfail($unit_id);

        $expected_program_id = $unit->program_id;

        $program = $unit->program;
        $program_id = $program->id;

        $this->assertEquals($program_id,$expected_program_id);

    }
}
