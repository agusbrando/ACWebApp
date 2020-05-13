<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subject;
use App\Models\Course;
use App\Models\Evaluation;
use App\Models\Role;
use App\Models\Percentage;
use App\Models\Task;
use App\Models\Type;
use App\Models\SubjectsUsers;
use Illuminate\Support\Facades\DB;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('Notas.index', compact('subjects'));
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
        $subject = Subject::find($id);
        $taskTypes = Type::all()->where('model', Task::class);
        $evaluaciones = $subject->evaluations;
        $suspendido = false;

        foreach ($evaluaciones as $eval) {
            $eval->percentages = $eval->types;
            $eval->users = $eval->users;
            $eval->tareas = $taskTypes;
            foreach ($eval->users as $user) {
                if (count($taskTypes) > 0) {
                    $sumaFinal = 0;
                    $recuperado = 0;
                    foreach ($taskTypes as $task_type) {
                        $tasks =  $user->tasks()->where('evaluation_id', $eval->id)->where('type_id', $task_type->id)->get();
                        $suma = 0;
                        $tareas[$task_type->name] = 0;
                        $user->tareas = $tareas;
                        if (count($tasks) > 0) {
                            foreach ($tasks as $task) {
                                $suma += $task->pivot->value;
                            }
                            $suma = $suma / count($tasks);
                            foreach ($eval->percentages as $percentage) {
                                if ($percentage->id == $task_type->id) {
                                    $tareas[$task_type->name] = round(($suma * $percentage->pivot->percentage) / 100, 2);
                                    $user->tareas = $tareas;
                                    // if ($tareas[$task_type->name] > round(($percentage->pivot->nota_min * $percentage->pivot->percentage) / 100, 2)) {
                                    //     $user->nota_final = "No llega a la nota media";
                                    //     break;
                                    // }
                                }
                            }
                            if ($task_type->name == 'Recuperacion' && $user->tareas[$task_type->name] != 0) {
                                $user->nota_final = $user->tareas[$task_type->name];
                                break;
                            } else {
                                $sumaFinal += $tareas[$task_type->name];
                            }
                        }
                        if($suspendido == false){
                            $user->nota_final = $sumaFinal;
                        }
                    }
                } else {
                    //TODO: Controlar Error
                    return view('Notas.evaluations');
                }
            }
        }

        return view('Notas.evaluations', compact('subject', 'evaluaciones'));
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
