<?php

namespace App\Http\Controllers;

use App\Models\Misbehavior;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaltasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $lista = Misbehavior::all();
        // return view('', compact('lista'));
        // $users = User::all();
        // $misbehaviors = null;

        // foreach ($users as $user) {
        //     $misbehaviors = $user->misbehaviors;
        // }

        // return view('faltas.show', compact('users','misbehaviors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = User::find($id);
        return view('faltas.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user_id)
    {
        $request->validate([
            'date' => 'required',
            'type' => 'required',
            'description' => 'required'

        ]);
        Misbehavior::create($request->all());
        return redirect()->route('faltas.index')
            ->with('success', 'Falta añadida!');
        // $misbehaviors =Misbehavior::all()->
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //ID del USUARIO
    public function show($id)
    {
        $misbehaviors = Misbehavior::all();
        $user = User::find($id);
        $user_id = $id;
        $subjects = Subject::all();

        $lista = [];

        foreach ($subjects as $subject) {
            // $timetables = $subject->timetables;
            // $count = 0;
            // foreach ($timetables as $timetable) {
            //     $misbehaviours = Misbehavior::all()->where('session_timetable_id', $timetable->id);
            //     if ($misbehaviours != null) {
            //         foreach ($misbehaviours as $misbehaviour) {
            //             if ($misbehaviour->user_id == $user_id) {
            //                 $count = $count + 1;
            //             }
            //         }
            //     }
            // }
            $count = 0;
            $listadoFaltas = [];
            //Año actual
            $year = 1;
            foreach ($user->yearUnions->where('subject_id', $subject->id)->where('year_id', $year) as $yearunions_faltas) {
                foreach ($yearunions_faltas->pivot->misbehavours as $falta) {
                    // echo ($yearunions_faltas->subject->name).' - '.($falta->description).' - '.($falta->date).'<br>';


                    //Hacer if para comprobar si es asistencia/comportamiento
                    $count = $count + 1;
                    array_push($listadoFaltas, $falta);

                }
            }

            $elemento = ['asignatura' => $subject->name, 'faltas' => $count, 'max' => $subject->max,'listaFaltas'=>$listadoFaltas];
            array_push($lista, $elemento);
        }
        return view('faltas.show', compact('user', 'lista', 'misbehaviors'));
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
    public function destroy($id, $user_id)
    {
        $misbehavior = Misbehavior::findOrFail($id);
        $misbehavior->delete();

        return redirect('/faltas/' . $user_id)->with('success', 'Falta eliminada');
    }
}
