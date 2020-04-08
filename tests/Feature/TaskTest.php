<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;
use App\Models\Evaluation;

class TaskTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testEvaluation()
    {
        $task = Task::find(1);

        $evaluation = Evaluation::find($task->evaluation_id);

        $this->assertEquals($task->evaluation->name, $evaluation->name);
    }

    public function testUsers()
    {
        
    }
}
