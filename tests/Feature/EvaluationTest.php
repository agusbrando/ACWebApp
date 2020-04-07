<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;
use App\Models\Evaluation;

class EvaluationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSubject()
    {

    }

    public function testTasks()
    {

         $evaluation = Evaluation::create([
             'subject_id' => 1,
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
    }

    public function testTypes()
    {
        
    }
}
