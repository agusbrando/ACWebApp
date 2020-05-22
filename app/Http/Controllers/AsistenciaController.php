<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Misbehavior;
use App\Models\User;
use App\Models\YearUnion;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    public function index()
    {
        $filtradoCurso = false;
        $users = User::all();
        $courses = Course::all();

        // foreach ($users as $key => $user) {
        //     if (in_array($user->id, $users->pluck('id')->toArray())) {
        //         $assignPermissions[$permission->id][$role->id] = true;
        //     }
        // }

        return view('asistencia.index', compact('users', 'courses', 'filtradoCurso'));
    }

    public function filter(Request $request)
    {
        $request->validate([

            'grupo' => 'required',
            'date' => 'required'

        ]);

        $fecha = $request->get('date');

        $yearUnion = YearUnion::where('year_id', 1)->where('course_id', $request->get('grupo'))->first();
        $users = $yearUnion->users;
        $courses = Course::all();
        $filtradoCurso = true;
        $subjects = Course::find($request->get('grupo'))->subjects;
        return view('asistencia.index', compact('users', 'courses', 'fecha', 'filtradoCurso', 'subjects'));
    }

    public function store(Request $request, $user_id)
    {
        $request->validate([
            'date' => 'required',
            'type_id' => 'required',
            'description' => 'required',
            'year_user_id' => 'required',
            'session_timetable_id' => 'required'

        ]);

        $misbehavior = new Misbehavior([
            'date' => $request->get('date'),
            'type_id' => $request->get('type_id'),
            'description' => $request->get('description'),
            'year_user_id' => 1,
            'session_timetable_id' => 1
        ]);
        $misbehavior->save();
        // return redirect()->route('faltas.index')
        //     ->with('success', 'Falta añadida!');
        return redirect('/faltas/' . $user_id);
    }
}
