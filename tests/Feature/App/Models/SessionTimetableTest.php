<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Carbon\Carbon;
use App\Models\Classroom;
use App\Models\Session;
use App\Models\Timetable;
use App\Models\Course;
use App\Models\Subject;
use App\Models\SessionTimetable;
class SessionTimetableTest extends TestCase
{
    public function testSessionTimetable()
    {
        $course = Course::create([
            'level' => 6,
            'name' => 'Tercero',
            'num_students' => 30
        ]);
        $subject = Subject::create([
            'course_id' => $course->id,
            'name' => 'Desarollo de Interfaz',
            'created_at' => now(),
            'updated_at' => now()
            ]);
        $timetable = Timetable::create([
            'name' => '2DAM2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
            
        $classroom = Classroom::create([
            'name' => 'default10',
            'number' => 7,
        ]);

        $session = Session::create([
            'classroom_id'=>$classroom->id,
            'time_start' => date('Y-m-d H:i:s'),
            'time_end' => date('Y-m-d H:i:s'),
            'model' => 'defaultModel'
        ]);
        
        $sessionTimetable = SessionTimetable::create([
        'session_id' => $session->id,
        'timetable_id' => $timetable->id,
        'subject_id' => $subject->id,
        'created_at' => now(),
        'updated_at' => now(),
        ]);
        $this->assertEquals($session->id,$sessionTimetable->session_id);
        $this->assertEquals($timetable->id,$sessionTimetable->timetable_id);
        $this->assertEquals($subject->id,$sessionTimetable->subject_id);
        
        SessionTimetable::destroy([$sessionTimetable->id]);
        $session->delete();
        $classroom->delete();
        $timetable->delete();
        $subject->delete();
        $course->delete();
        
       
        
        
    }
  
    
}
