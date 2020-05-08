<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;
use App\Models\Evaluation;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Type; 

class EvaluationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSubject()
    {

        $course = Course::create([
            'level' => 1,
            'name' => 'Primero',
            'num_students' => 30
        ]);

        $subject = Subject::create([
            'course_id' => $course->id,
            'name' => 'Ejemplo2'
        ]);

         $evaluation = Evaluation::create([
             'subject_id' => $subject->id,
             'name' => '1Eval'
         ]);
        
        $subject = Subject::find($evaluation->subject_id);

        $this->assertEquals($evaluation->subject, $subject);

        $evaluation->delete();
        $subject->delete();
        $course->delete();

    }

    public function testTasks()
    {

        $course = Course::create([
            'level' => 1,
            'name' => 'Primero',
            'num_students' => 30
        ]);

        $subject = Subject::create([
            'course_id' => $course->id,
            'name' => 'Ejemplo2'
        ]);

         $evaluation = Evaluation::create([
             'subject_id' => $subject->id,
             'name' => '1Eval'
         ]);

         $task1 = Task::create([
             'evaluation_id' => $evaluation->id,
             'name' => 'Practica 1'
         ]);

         $task2 = Task::create([
             'evaluation_id' => $evaluation->id,
             'name' => 'Examen'
         ]);

        $tasks = $evaluation->tasks->pluck('id');
        
        $expected_tasks_ids = collect([
            ['id' => $task1->id],
            ['id' => $task2->id]
        ])->pluck('id');

        $this->assertEquals($tasks, $expected_tasks_ids);

         
         $task1->delete();
         $task2->delete();
         $evaluation->delete();
         $subject->delete();
         $course->delete();
    }

    public function testTypes()
    {
        $course = Course::create([
            'level' => 1,
            'name' => 'Primero',
            'num_students' => 30
        ]);

        $subject = Subject::create([
            'course_id' => $course->id,
            'name' => 'Ejemplo2'
        ]);

        $evaluation = Evaluation::create([
             'subject_id' => $subject->id,
             'name' => '1Eval'
         ]);

        $type = Type::create([
            'model' => 'ejemplo',
            'name' => 'ejemplo'
        ]);

        $type2 = Type::create([
            'model' => 'ejemplo2',
            'name' => 'test'
        ]);

        $type->evaluations()->attach($evaluation, ['percentage'=>30]);
        $type2->evaluations()->attach($evaluation, ['percentage'=>10]);

        $types = $evaluation->types->pluck('id');
        
        $expected_types_ids = collect([
            ['id' => $type->id],
            ['id' => $type2->id]
        ])->pluck('id');

        $this->assertEquals($types, $expected_types_ids);

        $type->evaluations()->detach($evaluation);
        $type2->evaluations()->detach($evaluation);
        $type->delete();
        $type2->delete();
        $evaluation->delete();
        $subject->delete();
        $course->delete();
    }
}
