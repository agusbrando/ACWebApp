<?php

namespace App\Http\Controllers;

use App\Models\Misbehavior;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class FaltasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    //ID del USUARIO
    public function show($id)
    {
        $user = User::find($id);
        $user_id = $id;
        $subjects = Subject::all();

        $lista = [];

        foreach ($subjects as $subject) {
            $timetables = $subject->timetables;
            $count = 0;
            foreach ($timetables as $timetable) {
                $misbehaviours = Misbehavior::all()->where('session_timetable_id', $timetable->id);
                if ($misbehaviours != null) {
                    foreach ($misbehaviours as $misbehaviour) {
                        if ($misbehaviour->user_id == $user_id) {
                            $count = $count + 1;
                        }
                    }
                }
            }
            $elemento = ['asignatura' => $subject->abbreviation, 'faltas' => $count, 'max' => $subject->max];
            array_push($lista, $elemento);
        }
        return view('faltas.show', compact('user', 'lista'));
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
