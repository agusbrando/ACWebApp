<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Subject;
use App\Models\Course;
use App\Models\Evaluation; 

class SubjectTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCourse()
    {
        $course = Course::create([
            'level' => 1,
            'name' => 'Primero',
            'num_students' => 30
        ]);

        $subject = Subject::create([
            'course_id' => $course->id,
            'name' => 'Ejemplo5'
        ]);

        $course = Course::find($subject->course_id);

        $this->assertEquals($subject->course, $course);

        $subject->delete();
        $course->delete();
    }

    public function testEvaluation()
    {
        $course = Course::create([
            'level' => 1,
            'name' => 'Primero',
            'num_students' => 30
        ]);

        $subject = Subject::create([
            'course_id' => $course->id,
            'name' => 'Ejemplo6'
        ]);

         $evaluation = Evaluation::create([
             'subject_id' => $subject->id,
             'name' => '1Eval'
         ]);

         $evaluation2 = Evaluation::create([
            'subject_id' => $subject->id,
            'name' => '2Eval'
        ]);

        $evaluations = $subject->evaluations->pluck('id');
        
        $expected_evaluations_ids = collect([
            ['id' => $evaluation->id],
            ['id' => $evaluation2->id]
        ])->pluck('id');

        $this->assertEquals($evaluations, $expected_evaluations_ids);

        $evaluation->delete();
        $evaluation2->delete();
        $subject->delete();
        $course->delete();
        
    }
}
