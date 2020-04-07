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

        $course = Course::create([
            'level' => 1,
            'name' => 'Primero',
            'num_students' => 30
        ]);

        $subject1 = Subject::create([
            'course_id' => $course->id,
            'name' => 'Ejemplo4'
        ]);
        
        $subject2 = Subject::create([
            'course_id' => $course->id,
            'name' => 'Ejemplo5'
        ]);
        
        $subjects = $course->subjects->pluck('id');
        
        $expected_subjects_ids = collect([
            ['id' => $subject1->id],
            ['id' => $subject2->id]
        ])->pluck('id');

        $this->assertEquals($subjects, $expected_subjects_ids);

        $subject1->delete();
        $subject2->delete();
        $course->delete();

    }
}
