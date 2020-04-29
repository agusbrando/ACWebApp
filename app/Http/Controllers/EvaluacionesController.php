<?php

namespace App\Http\Controllers;

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
    public function show($id)
    {
        $users = User::all();
        $subject = Subject::find($id);
        $tasksType = Type::all()->where('model', Task::class);
        $evaluations = $subject->evaluations;

        $usersEval1 = array();
        $usersEval2 = array();
        $usersEval3 = array();

        foreach ($subject->evaluations as $eval) {
            switch ($eval->name) {
                case "1Eval":
                    $usersEval1 = $eval->users;
                    break;
                case "2Eval":
                    $usersEval2 = $eval->users;
                    break;
                case "3Eval":
                    $usersEval3 = $eval->users;
                    break;
            }
        }

        $parciales = null;
        $trabajos = null;

        foreach($tasksType as $task){
            $id = $task->id;
            switch($id){
                case 8:
                    $parciales = Task::all()->where('type_id', $task->id);
                    break;
                case 9:
                    $trabajos = Task::all()->where('type_id', $task->id);
                    break;
            }
            
        }

        return view('Notas.desglose', compact('usersEval1', 'usersEval2', 'usersEval3', 'subject', 'parciales', 'trabajos', 'evaluations'));
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
