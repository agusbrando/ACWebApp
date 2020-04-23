<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subject;
use App\Models\Percentage;
use App\Models\Type;
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

        return view('Notas.crearPorcentaje', compact('evaluaciones', 'types'));
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
            'type' => 'required',
            'porcentaje' => 'required',
            'evaluaciones' => 'required',
            'nota_min' => 'required',
            'nota_med' => 'required',
        ]);

        $evaluaciones = $request->get('evaluaciones');

        foreach($evaluaciones as $eval){
            $porcentaje = Percentage::create([
                'evaluation_id' => $eval,
                'type_id' => $request->get('type'),
                'percentage' => $request->get('porcentaje'),
                'nota_min' => $request->get('nota_min'),
                'nota_media' => $request->get('nota_med'),
            ]);
        }
        

        $porcentaje->save();

        $subjects = Subject::all();
        return view('Notas.index', compact('subjects'));

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
