<?php

namespace App\Http\Controllers;

use App\Models\Calification;
use App\Models\Evaluation;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subject;
use App\Models\Type;
use App\Models\Task;
use Illuminate\Support\Facades\DB;


class EvaluacionesController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->where('role_id', '=', 4)->get();

        return view('Notas.evaluations', compact('users', 'nombre'));
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
    public function show($subject_id, $evaluation_id)
    {
        $subject = Subject::find($subject_id);
        $evaluation = Evaluation::find($evaluation_id);
        $evaluation->tasksTypes = $evaluation->types;
        $evaluation->users = $evaluation->users;

        $notaParciales = null;
        $notaTrabajos = null;
        $notaActitud = null;
        $notaRecuperacion = null;

        $mediaParciales = null;
        $mediaTrabajos = null;
        $mediaActitud = null;
        $mediaRecuperacion = null;

        $aux = 0;
        $aux2 = 0;

        foreach ($evaluation->tasksTypes as $task_type) {
            $name = $task_type->name;
            switch ($name) {
                case 'Examenes':
                    $evaluation->parciales = Task::where('type_id', $task_type->id)->where('evaluation_id', $evaluation->id)->with('users')->get();
                    foreach ($evaluation->parciales as $parcial) {
                        foreach ($parcial->users as $user) {
                            $notaParciales[$user->id][$parcial->id] = $user->pivot->value;
                            $evaluation->notaParciales = $notaParciales;
                        }
                    }
                    if ($evaluation->notaParciales != null) {
                        foreach ($evaluation->notaParciales as $user_id => $examenes) {
                            foreach ($examenes as $nota) {
                                if ($nota < $task_type->pivot->nota_min_tarea && $nota != null) {
                                    $mediaParciales[$user_id] = "No llega a la nota minima tarea";
                                    $evaluation->mediaParciales = $mediaParciales;
                                    break;
                                } else {
                                    if ($aux2 == count($evaluation->parciales)) {
                                        $aux2 = 0;
                                    }
                                    if ($nota != null) {
                                        $aux2++;
                                    }
                                    if ($aux2 == 0) {
                                        $aux2 = count($evaluation->parciales);
                                    }
                                    $aux += $nota;
                                    $mediaParciales[$user_id] = round($aux / $aux2, 2);
                                    $evaluation->mediaParciales = $mediaParciales;
                                }
                            }
                            $aux = 0;
                            $aux2 = 0;
                        }
                    }

                    break;
                case 'Trabajos':
                    $evaluation->trabajos = Task::where('type_id', $task_type->id)->where('evaluation_id', $evaluation->id)->with('users')->get();
                    foreach ($evaluation->trabajos as $trabajo) {
                        foreach ($trabajo->users as $user) {
                            $notaTrabajos[$user->id][$trabajo->id] = $user->pivot->value;
                            $evaluation->notaTrabajos = $notaTrabajos;
                        }
                    }
                    if ($evaluation->notaTrabajos != null) {
                        foreach ($evaluation->notaTrabajos as $user_id => $trabajosNotas) {
                            foreach ($trabajosNotas as $nota) {
                                if ($nota < $task_type->pivot->nota_min_tarea && $nota != null) {
                                    $mediaTrabajos[$user_id] = "No llega a la nota minima tarea";
                                    $evaluation->mediaTrabajos = $mediaTrabajos;
                                    break;
                                } else {
                                    if ($aux2 == count($evaluation->trabajos)) {
                                        $aux2 = 0;
                                    }
                                    if ($nota != null) {
                                        $aux2++;
                                    }
                                    if ($aux2 == 0) {
                                        $aux2 = count($evaluation->trabajos);
                                    }
                                    $aux += $nota;
                                    $mediaTrabajos[$user_id] = round($aux / $aux2, 2);
                                    $evaluation->mediaTrabajos = $mediaTrabajos;
                                }
                            }
                            $aux = 0;
                            $aux2 = 0;
                        }
                    }
                    break;
                case 'Actitud':
                    $evaluation->actitud = Task::where('type_id', $task_type->id)->where('evaluation_id', $evaluation->id)->with('users')->get();
                    foreach ($evaluation->actitud as $act) {
                        foreach ($act->users as $user) {
                            $notaActitud[$user->id][$act->id] = $user->pivot->value;
                            $evaluation->notaActitud = $notaActitud;
                        }
                    }
                    if ($evaluation->notaActitud != null) {
                        foreach ($evaluation->notaActitud as $user_id => $actitudNotas) {
                            foreach ($actitudNotas as $nota) {
                                if ($nota < $task_type->pivot->nota_min_tarea && $nota != null) {
                                    $mediaActitud[$user_id] = "No llega a la nota minima tarea";
                                    $evaluation->mediaActitud = $mediaActitud;
                                    break;
                                } else {
                                    if ($aux2 == count($evaluation->actitud)) {
                                        $aux2 = 0;
                                    }
                                    if ($nota != null) {
                                        $aux2++;
                                    }
                                    if ($aux2 == 0) {
                                        $aux2 = count($evaluation->actitud);
                                    }
                                    $aux += $nota;
                                    $mediaActitud[$user_id] = round($aux / $aux2, 2);
                                    $evaluation->mediaActitud = $mediaActitud;
                                }
                            }
                            $aux = 0;
                            $aux2 = 0;
                        }
                    }
                    break;
                case 'Recuperacion':
                    $evaluation->recuperacion = Task::where('type_id', $task_type->id)->where('evaluation_id', $evaluation->id)->with('users')->get();
                    foreach ($evaluation->recuperacion as $rec) {
                        foreach ($rec->users as $user) {
                            $notaRecuperacion[$user->id][$rec->id] = $user->pivot->value;
                            $evaluation->notaRecuperacion = $notaRecuperacion;
                        }
                    }
                    if ($evaluation->notaRecuperacion != null) {
                        foreach ($evaluation->notaRecuperacion as $user_id => $recuperacionNotas) {
                            foreach ($recuperacionNotas as $nota) {
                                if ($nota < $task_type->pivot->nota_min_tarea && $nota != null) {
                                    $mediaRecuperacion[$user_id] = "No llega a la nota minima tarea";
                                    $evaluation->mediaRecuperacion = $mediaRecuperacion;
                                    break;
                                } else {
                                    if ($aux2 == count($evaluation->recuperacion)) {
                                        $aux2 = 0;
                                    }
                                    if ($nota != null) {
                                        $aux2++;
                                    }
                                    if ($aux2 == 0) {
                                        $aux2 = count($evaluation->recuperacion);
                                    }
                                    $aux += $nota;
                                    $mediaRecuperacion[$user_id] = round($aux / $aux2, 2);
                                    $evaluation->mediaRecuperacion = $mediaRecuperacion;

                                }
                            }
                            $aux = 0;
                            $aux2 = 0;
                        }
                    }
                    break;
            }
        }

        return view('Notas.desglose', compact('evaluation', 'subject'));
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
