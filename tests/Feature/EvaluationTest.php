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

        // $evaluation = Evaluation::create([
        //     'id' => 1,
        //     'subject_id' => 1,
        //     'name' => '1Eval'
        // ]);

        // $task1 = Task::create([
        //     'id' => 1,
        //     'evaluation_id' => 1,
        //     'name' => 'Practica 1'
        // ]);

        // $task2 = Task::create([
        //     'id' => 2,
        //     'evaluation_id' => 1,
        //     'name' => 'Examen'
        // ]);

        $evaluation = Evaluation::find(1);

        $tasks = $evaluation->tasks->pluck('id');
        
        $expected_tasks_ids = collect([
            ['id' => 1],
            ['id' => 2]
        ])->pluck('id');

        $this->assertEquals($tasks, $expected_tasks_ids);

        // $evaluation->delete();
        // $task1->delete();
        // $task2->delete();
    }

    public function testPercentages()
    {
        
    }
}
