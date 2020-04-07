<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Subject;
use App\Models\Course;

class SubjectTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCourse()
    {
        // $subject = Subject::create([
        //     'course_id' => 1,
        //     'name' => 'PMM'
        // ]);

        // $course = Course::create([
        //     'level' => 1,
        //     'name' => 'Primero',
        //     'num_students' => 30
        // ]);

        $subject = Subject::find(1);
        $course = Course::find($subject->course_id);

        $this->assertEquals($subject->course, $course);

        // $subject->delete();
        // $course->delete();
    }

    public function testEvaluation()
    {
        // $subject = Subject::create([
        //     'course_id' => 1,
        //     'name' => 'PMM'
        // ]);

        // $evaluation = Evaluation::create([
        //     'subject_id' => 1,
        //     'name' => '1Eval'
        // ]);

        // $evaluation2 = Evaluation::create([
        //     'subject_id' => 1,
        //     'name' => '2Eval'
        // ]);

        $subject = Subject::find(1);

        $evaluations = $subject->evaluations->pluck('id');
        
        $expected_evaluations_ids = collect([
            ['id' => 1],
            ['id' => 2]
        ])->pluck('id');

        $this->assertEquals($evaluations, $expected_evaluations_ids);

        // $subject->delete();
        // $evaluation->delete();
        // $evaluation2->delete();
    }
}
