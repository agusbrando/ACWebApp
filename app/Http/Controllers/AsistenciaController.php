<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Models\YearUnion;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    public function index()
    {
        $filtradoCurso=false;
        $users = User::all();
        $courses = Course::all();
        return view('asistencia.index', compact('users', 'courses', 'filtradoCurso'));
    }

    public function filter(Request $request)
    {
        $request->validate([

            'grupo' => 'required',
            'date' => 'required'

        ]);

        $fecha = $request->get('date');

        $yearUnion=YearUnion::where('year_id', 1)->where('course_id', $request->get('grupo'))->first();
        $users=$yearUnion->users;
        $courses=Course::all();
        $filtradoCurso=true;
        $subjects=Course::find($request->get('grupo'))->subjects; 
        return view('asistencia.index', compact('users', 'courses', 'fecha', 'filtradoCurso', 'subjects'));
    }
}
