<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subject;
use App\Models\Course;
use App\Models\Role;
use Illuminate\Support\Facades\DB; 

class NotasController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->where('role_id', '=', 4)->get();
        $roles = Role::all();
        $subjects = Subject::all();
        $courses = Course::all();
        return view('Notas.index', compact('users', 'subjects', 'courses', 'roles'));
    }

    public function datos(Request $request){

        $request->validate([
            'cicloFormativo'=>'required',
            'curso'=>'required',
            'asignatura'=>'required',
            'role_id' => 'required'
        ]);

        $role_id = $request->get('role_id');
        $cicloFormativo = $request->get('cicloFormativo');
        $curso = $request->get('curso');
        $asignatura = $request->get('asignatura');

        $subjects = Subject::all();
        $courses = Course::all();
        $roles = Role::all();

        $users = DB::table('users')->where('role_id', '=', $role_id)->get();

        return view('Notas.index', compact('users', 'subjects', 'courses', 'roles'));
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
