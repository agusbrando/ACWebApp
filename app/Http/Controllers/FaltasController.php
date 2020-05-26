<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Misbehavior;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaltasController extends Controller
{

    public function __construct(Request $request)
    {
        $user = Auth::user();
        if($user != null){
            $notifications = $user->unreadNotifications;
            $countNotifications = $user->unreadNotifications->count();
        }else{
            $notifications = [];
            $countNotifications = 0;
        }

        $request->session()->put('notifications', $notifications);
        $request->session()->put('countNotifications', $countNotifications);

    }

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
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'type_id' => 'required',
            'description' => 'required',
            'user_id' => 'required',

        ]);
        $user_id = $request->get('user_id');
        $fechaFin  = str_replace('/', '-',  $request->get('date'));
        $fechaFin = date("Y-m-d H:i", strtotime($fechaFin));
        $misbehavior = Misbehavior::create([
            'date' => $fechaFin,
            'type_id' => $request->get('type_id'),
            'description' => $request->get('description'),
            'year_user_id' => User::find($user_id)->yearUnions->first()->pivot->id,
            'session_timetable_id' => 1
        ]);
        $misbehavior->save();
        // return redirect()->route('faltas.index')
        //     ->with('success', 'Falta añadida!');
        return redirect('/faltas/'. $user_id);
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
        $course = Course::find(5);
        $subjects = $course->subjects;
        $typesFaltaLeve = Type::all()->where('name', 'Falta Leve')->first();
        $typesFaltaGrave = Type::all()->where('name', 'Falta Grave')->first();
        $typesFaltaMuyGrave = Type::all()->where('name', 'Falta muy Grave')->first();
        $typesAsistencia = Type::all()->where('name', 'Asistencia')->first();
        $lista = [];

        foreach ($subjects as $subject) {
            $count = 0;
            $listadoFaltasAsistencia = [];

            //ID AÑO ACTUAL
            $year = 1;
            foreach ($user->yearUnions->where('subject_id', $subject->id)->where('year_id', $year) as $yearunions_faltas) {
                foreach ($yearunions_faltas->pivot->misbehavours as $falta) {

                    if ($falta->type_id == $typesAsistencia->id) {
                        $count = $count + 1;
                        array_push($listadoFaltasAsistencia, $falta);
                    }
                }
            }

            $elemento = ['asignatura' => $subject->name, 'faltas' => $count, 'max' => $subject->pivot->max_hours, 'listaFaltas' => $listadoFaltasAsistencia];
            array_push($lista, $elemento);
        }

        $listaComportamiento = [];
        $listaFaltaLeve = [];
        $listaFaltaGrave = [];
        $listaFaltaMuyGrave = [];

        //ID AÑO ACTUAL
        $year = 1;
        foreach ($user->yearUnions->where('year_id', $year) as $yearunions_faltas) {
            foreach ($yearunions_faltas->pivot->misbehavours as $falta) {


                if ($falta->type_id == $typesFaltaLeve->id) {
                    array_push($listaFaltaLeve, $falta);
                } elseif ($falta->type_id == $typesFaltaGrave->id) {
                    array_push($listaFaltaGrave, $falta);
                } elseif ($falta->type_id == $typesFaltaMuyGrave->id) {
                    array_push($listaFaltaMuyGrave, $falta);
                }
            }
        }
        return view('faltas.show', compact('user', 'lista', 'courses', 'misbehaviors', 'listaFaltaLeve', 'listaFaltaGrave', 'listaFaltaMuyGrave'));
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
    public function destroy($user_id, $id)
    {
        $misbehavior = Misbehavior::findOrFail($id);
        $misbehavior->delete();

        return redirect('/faltas/' . $user_id)->with('success', 'Falta eliminada');
    }
}
