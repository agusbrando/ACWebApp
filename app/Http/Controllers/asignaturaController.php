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

        $evaluaciones = $subject->evaluations;
        $eval1 = array();
        $eval2 = array();
        $eval3 = array();

        foreach ($subject->evaluations as $eval) {
            $types = $eval->types;
            switch ($eval->name) {
                case "1Eval":
                    foreach ($types as $type) {
                        $percentage = new Percentage([
                            "evaluacion_id" => $type->pivot->evaluation_id,
                            "type_id" => $type->pivot->type_id,
                            "porcentaje" => $type->pivot->percentage,
                            "nota_min" => $type->pivot->nota_min,
                            "nota_media" => $type->pivot->nota_media,
                        ]);
                        $percentage->type = $type->name;
                        array_push($eval1, $percentage);
                    }
                    break;
                case "2Eval":
                    foreach ($types as $type) {
                        $percentage = new Percentage([
                            "evaluacion_id" => $type->pivot->evaluation_id,
                            "type_id" => $type->pivot->type_id,
                            "porcentaje" => $type->pivot->percentage,
                            "nota_min" => $type->pivot->nota_min,
                            "nota_media" => $type->pivot->nota_media,
                        ]);
                        $percentage->type = $type->name;
                        array_push($eval2, $percentage);
                    }
                    break;
                case "3Eval":
                    foreach ($types as $type) {
                        $percentage = new Percentage([
                            "evaluacion_id" => $type->pivot->evaluation_id,
                            "type_id" => $type->pivot->type_id,
                            "porcentaje" => $type->pivot->percentage,
                            "nota_min" => $type->pivot->nota_min,
                            "nota_media" => $type->pivot->nota_media,
                        ]);
                        $percentage->type = $type->name;
                        array_push($eval3, $percentage);
                    }
                    break;
            }
        }

        return view('Notas.evaluations', compact('subject', 'eval1', 'eval2', 'eval3', 'evaluaciones'));
    }

    // protected function calculateDataShow($id)
    // {
    //     $subject = Subject::find($id);
    //     $taskTypes = Type::all()->where('model', Task::class);
    //     $evaluaciones = $subject->evaluations;


    //     foreach ($evaluaciones as $eval) {
    //         $percentages = $eval->types;
    //         foreach ($eval->users as $user) {
    //             foreach ($taskTypes as $task_type) {
    //                 $tasks =  $user->tasks()->where('evaluation_id', $eval->id)->where('type_id', $task_type->id)->get();
    //                 $suma = 0;
    //                 foreach ($tasks as $task) {
    //                     $suma += $task->pivot->value;
                        
    //                 }
    //                 foreach($percentages as $percentage){
    //                     if($percentage->type_id = )
    //                 }
    //                 $user->$task_type->name = 0;
    //             }
    //         }
    //     }
    // }

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
