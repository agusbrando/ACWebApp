<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subject;
use App\Models\Percentage;
use App\Models\Type;
use App\Models\Evaluation;
use Illuminate\Support\Facades\DB;

class PorcentajesController extends Controller
{
    public function index($id = null)
    {
        if($id != null){
            $percentages = Percentage::all()->where('evaluation_id', $id);
        }else{
            $percentages = Percentage::all();
        }

        $users = User::all()->where('role_id', '=', 4);
        $subjects = Subject::all();
        
        return view('Notas.porcentajes', compact('users', 'subjects', 'percentages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $subject = Subject::find($id);
        $evaluaciones = $subject->evaluations()->orderBy('name', 'asc')->get();

        $types = Type::all()->where('model', Percentage::class);

        return view('Notas.crearPorcentaje', compact('evaluaciones', 'types', 'subject'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'porcentaje' => 'required',
            'evaluaciones' => 'required',
            'type' => 'required',
            'nota_min' => 'required',
            'nota_media' => 'required',
            'subject' => 'required'
        ]);

        $evaluaciones = $request->get('evaluaciones');

        foreach($evaluaciones as $eval){
            $evaluacion = Evaluation::find($eval);
            $evaluacion->types()->attach(intval($request->get('type')),[
                'percentage' => $request->get('porcentaje'),
                'nota_min' => $request->get('nota_min'),
                'nota_media' => $request->get('nota_media'),
            ]);
        }

        return redirect('asignaturas/'.$request->get('subject'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($subject_id, $evaluation_id, $type_id )
    {
        $subject = Subject::find($subject_id);
        $evaluaciones = $subject->evaluations()->orderBy('name', 'asc')->get();
        $porcentaje = Percentage::where('evaluation_id', $evaluation_id)->where('type_id', $type_id)->first();
        $types = Type::all()->where('model', Percentage::class);

        return view('Notas.editPorcentaje', compact('porcentaje', 'evaluaciones', 'types', 'subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'porcentaje' => 'required',
            'subject' => 'required',
            'evaluation_id' => 'required',
            'type_id' => 'required',
            'nota_min' => 'required',
            'nota_media' => 'required',
        ]);

        $idS= $request->get('subject');

        $evaluacion = Evaluation::find($request->get('evaluation_id'));
        $evaluacion->types()->updateExistingPivot(intval($request->get('type_id')),[
            'percentage' => $request->get('porcentaje'),
            'nota_min' => $request->get('nota_min'),
            'nota_media' => $request->get('nota_media'),
        ]);

        return redirect('asignaturas/'.$request->get('subject'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($subject_id, $evaluation_id, $type_id)
    {

        $evaluacion = Evaluation::find($evaluation_id);
        $evaluacion->types()->detach(intval($type_id));

        return redirect('asignaturas/'.$subject_id);
    }
}
