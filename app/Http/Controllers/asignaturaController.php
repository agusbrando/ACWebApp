<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subject;
use App\Models\Course;
use App\Models\Evaluation;
use App\Models\Role;
use App\Models\Percentage;
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
        $users = User::all();
        $subjects = Subject::all();
        return view('Notas.index', compact('users', 'subjects'));
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
        $users = User::all()->where('role_id', '=', 4);
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
                        array_push($eval1, new Percentage([
                            "evaluacion_id" => $type->pivot->evaluation_id,
                            "type_id" => $type->pivot->type_id,
                            "porcentaje" =>$type->pivot->percentage,
                            "nota_min" =>$type->pivot->nota_min,
                            "nota_media" =>$type->pivot->nota_media,
                        ]));
                    }
                    break;
                case "2Eval":
                    foreach ($types as $type) {
                        array_push($eval2, new Percentage([
                            "evaluacion_id" => $type->pivot->evaluation_id,
                            "type_id" => $type->pivot->type_id,
                            "porcentaje" =>$type->pivot->percentage,
                            "nota_min" =>$type->pivot->nota_min,
                            "nota_media" =>$type->pivot->nota_media,
                        ]));
                    }
                    break;
                case "3Eval":
                    foreach ($types as $type) {
                        array_push($eval3, new Percentage([
                            "evaluacion_id" => $type->pivot->evaluation_id,
                            "type_id" => $type->pivot->type_id,
                            "porcentaje" =>$type->pivot->percentage,
                            "nota_min" =>$type->pivot->nota_min,
                            "nota_media" =>$type->pivot->nota_media,
                        ]));
                    }
                    break;
            }
        }

        return view('Notas.evaluations', compact('users', 'subject', 'eval1', 'eval2', 'eval3', 'evaluaciones'));
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
