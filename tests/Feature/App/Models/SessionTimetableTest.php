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
use App\Models\Evaluation;
use App\Models\Event;
use App\Models\Subject;
use App\Models\SessionTimetable;
use App\Models\Type;
use App\Models\Year;
use App\Models\YearUnion;

class SessionTimetableTest extends TestCase
{
    public function testSessionTimetable()
    {
        $type=Type::create([
            'name' => 'Prueba',
            'model' => Event::class,
	        'created_at' => now(),
            'updated_at' => now()  
        ]);
        $evaluation = Evaluation::create([
            'name' => '2Eval',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $year=Year::create([
            'name' => '2020/2021',
            'date_start' => '2020/09/09',
            'date_end' => '2021/06/15',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $classroom = Classroom::create([
            'name' => 'default10',
            'number' => 100,
        ]);
        $course = Course::create([
            'level' => 1,
            'name' => 'curso',
            'abbreviation' =>'CURSO',
            'num_students' => 30,
        ]);
        $subject = Subject::create([
            'name' => 'Sistemas operativos Monopuesto',
            'abbreviation'=>'SOM',
            "hours"=>128	,
            'color'=>'#1accec',
            
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $year_union = YearUnion::create([
            'subject_id' => $subject->id,
            'course_id' => $course->id,
            'evaluation_id' => $evaluation->id,
            'year_id' => $year->id,
            'date_start' => now(),
            'date_end' => now(),
            'classroom_id' =>$classroom->id ,
            'created_at' => now(),
            'updated_at' => now(),

        ]);
        $timetable = Timetable::create([
            'name' => '2DAM2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        

        $session = Session::create([
            'type_id'=>$type->id,
            'day'=>'3',
            'classroom_id' => $classroom->id,
             'time_start' => '15:00',
            'time_end' => '15:55',
            'model' => 'defaultModel'
        ]);

        $sessionTimetable = SessionTimetable::create([
            'session_id' => $session->id,
            'timetable_id' => $timetable->id,
            'year_union_id' => $year_union->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $sesion=$sessionTimetable->session;
        $horario=$sessionTimetable->timetable;
        $anyo=$sessionTimetable->yearUnion;
        $this->assertEquals($subject->id, $anyo->id);
        $this->assertEquals($session->id, $sesion->id);
        $this->assertEquals($timetable->id,$horario->id );
        

        SessionTimetable::destroy([$sessionTimetable->id]);
        $session->delete();
        $classroom->delete();
        $timetable->delete();
        $subject->delete();
        $course->delete();
    }
}
