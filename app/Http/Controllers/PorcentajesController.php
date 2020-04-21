<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Percentage;
use Illuminate\Support\Facades\DB;

class PorcentajesController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->where('role_id', '=', 4)->get();
        $subjects = Subject::all();
        $percentages = Percentage::all();
        return view('Notas.porcentajes', compact('users', 'subjects', 'percentages'));
    }

    // public function datos(Request $request){

    //     $request->validate([
    //         'cicloFormativo'=>'required',
    //         'curso'=>'required',
    //         'asignatura'=>'required',
    //         'role_id' => 'required'
    //     ]);

    //     $role_id = $request->get('role_id');
    //     $cicloFormativo = $request->get('cicloFormativo');
    //     $curso = $request->get('curso');
    //     $asignatura = $request->get('asignatura');

    //     $subjects = Subject::all();
    //     $courses = Course::all();
    //     $roles = Role::all();

    //     $users = DB::table('users')->where('role_id', '=', $role_id)->get();

    //     return view('Notas.porcentajes', compact('users', 'subjects', 'courses', 'roles'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Notas.crearPorcentaje');
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
            'name' => 'required',
            'porcentaje' => 'required',
            'nota_min' => 'required',
            'nota_med' => 'required',
        ]);

        $name = $request->get('name');
        $porcentaje = $request->get('porcentaje');
        $nota_min = $request->get('nota_min');
        $nota_med = $request->get('nota_med');

        $porcentaje = Percentage::create([
            'evaluation_id' => 2,
            'type_id' => 1,
            'name' => $request->get('name'),
            'porcentaje' => $request->get('porcentaje'),
            'nota_min' => $request->get('nota_min'),
            'nota_med' => $request->get('nota_med'),
        ]);

        $porcentaje->save();
        $users = DB::table('users')->where('role_id', '=', 4)->get();
        $subjects = Subject::all();
        $percentages = Percentage::all();
        return view('Notas.porcentajes', compact('users', 'subjects', 'percentages'));

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
