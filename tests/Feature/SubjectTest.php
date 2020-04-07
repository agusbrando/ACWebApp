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
        //     'id' => 1,
        //     'course_id' => 1,
        //     'name' => 'PMM'
        // ]);

        // $course = Course::create([
        //     'id' => 1,
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
}
