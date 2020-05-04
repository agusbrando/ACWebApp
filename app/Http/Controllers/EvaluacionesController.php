<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subject;
use App\Models\Type;
use App\Models\Task;
use Illuminate\Support\Facades\DB;


class EvaluacionesController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->where('role_id', '=', 4)->get();

        return view('Notas.evaluations', compact('users', 'nombre'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($subject_id, $evaluation_id)
    {
        $subject = Subject::find($subject_id);
        $tasksType = Type::all()->where('model', Task::class);
        $evaluation = Evaluation::find($evaluation_id);
        $users = $evaluation->users;

        $parciales = array();
        $trabajos = array();
        $actitud = array();

        foreach ($tasksType as $task) {
            $id = $task->id;
            switch ($id) {
                case 8:
                    $parciales = Task::all()->where('type_id', $task->id)->where('evaluation_id', $evaluation->id);
                    break;
                case 9:
                    $trabajos = Task::all()->where('type_id', $task->id)->where('evaluation_id', $evaluation->id);;
                    break;
                case 10:
                    $actitud = Task::all()->where('type_id', $task->id)->where('evaluation_id', $evaluation->id);;
                    break;
            }
        }

        return view('Notas.desglose', compact('evaluation', 'users', 'subject', 'parciales', 'trabajos', 'actitud'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
