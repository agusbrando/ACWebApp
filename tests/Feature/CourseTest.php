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
    public function testExample()
    {

        $subject = Subject::find(1);

        $course = Course::find($subject->courses_id);

        $this->assertEquals($subject->course->name, $course->name);

    }
}
