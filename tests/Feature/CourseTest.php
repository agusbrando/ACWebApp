<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Course;
use App\Models\Subject;

class CourseTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSubjects()
    {
        $course = Course::find(1);

        $subjects = [];
        
        array_push($subjects, Subject::find($course->subject_id));

        $this->assertEquals($subject->course->name, $course->name);

    }
}
