<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Task;
use App\Models\Course;
use App\Models\Subject;
use App\Models\YearUnion;
use App\Models\Evaluation;
use App\Models\YearUnionUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;


class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('subjects.create', compact('subjects'));
    }

    public function desglose(Request $request)
    {

        //TODO JAVI NO FUNCIONA
        $request->validate([
            'subject' => 'required',
            'year' => 'required',
            'course' => 'required',
            'evaluation' => 'required'
        ]);

        $subject = Subject::find($request->get('subject'));
        $evaluation = Evaluation::find($request->get('evaluation'));
        $yearUnions = YearUnion::where('subject_id', $request->get('subject'))->where('year_id', $request->get('year'))->where('course_id', $request->get('course'))->get()->load('evaluation');
        $taskTypes = Type::all()->where('model', Task::class);

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

        foreach ($yearUnions as $yearUnion) {
            $yearUnion->evaluation = $yearUnion->evaluation;
            $yearUnion->percentages = $yearUnion->types;
            $yearUnion->evaluation->users = $yearUnion->users;

            foreach ($taskTypes as $task_type) {
                $name = $task_type->name;
                switch ($name) {
                    case 'Examenes':
                        $yearUnion->evaluation->parciales = Task::where('year_union_id', $yearUnion->id)->where('type_id', $task_type->id)->with('users')->get();
                        foreach ($yearUnion->evaluation->parciales as $parcial) {
                            foreach ($parcial->users as $user) {
                                $notaParciales[$user->id][$parcial->id] = $user->pivot->value;
                                $yearUnion->evaluation->notaParciales = $notaParciales;
                            }
                        }
                        if ($yearUnion->evaluation->notaParciales != null) {
                            foreach ($yearUnion->evaluation->notaParciales as $user_id => $examenes) {
                                foreach ($examenes as $nota) {
                                    if ($nota < $task_type->pivot->nota_min_tarea && $nota != null) {
                                        $mediaParciales[$user_id] = "No llega a la nota minima tarea";
                                        $yearUnion->evaluation->mediaParciales = $mediaParciales;
                                        break;
                                    } else {
                                        if ($aux2 == count($yearUnion->evaluation->parciales)) {
                                            $aux2 = 0;
                                        }
                                        if ($nota != null) {
                                            $aux2++;
                                        }
                                        if ($aux2 == 0) {
                                            $aux2 = count($yearUnion->evaluation->parciales);
                                        }
                                        $aux += $nota;
                                        $mediaParciales[$user_id] = round($aux / $aux2, 2);
                                        $yearUnion->evaluation->mediaParciales = $mediaParciales;
                                    }
                                }
                                $aux = 0;
                                $aux2 = 0;
                            }
                        }

                        break;
                    case 'Trabajos':
                        $yearUnion->evaluation->trabajos = Task::where('year_union_id', $yearUnion->id)->where('type_id', $task_type->id)->with('users')->get();
                        foreach ($yearUnion->evaluation->trabajos as $trabajo) {
                            foreach ($trabajo->users as $user) {
                                $notaTrabajos[$user->id][$trabajo->id] = $user->pivot->value;
                                $yearUnion->evaluation->notaTrabajos = $notaTrabajos;
                            }
                        }
                        if ($yearUnion->evaluation->notaTrabajos != null) {
                            foreach ($yearUnion->evaluation->notaTrabajos as $user_id => $trabajosNotas) {
                                foreach ($trabajosNotas as $nota) {
                                    if ($nota < $task_type->pivot->nota_min_tarea && $nota != null) {
                                        $mediaTrabajos[$user_id] = "No llega a la nota minima tarea";
                                        $yearUnion->evaluation->mediaTrabajos = $mediaTrabajos;
                                        break;
                                    } else {
                                        if ($aux2 == count($yearUnion->evaluation->trabajos)) {
                                            $aux2 = 0;
                                        }
                                        if ($nota != null) {
                                            $aux2++;
                                        }
                                        if ($aux2 == 0) {
                                            $aux2 = count($yearUnion->evaluation->trabajos);
                                        }
                                        $aux += $nota;
                                        $mediaTrabajos[$user_id] = round($aux / $aux2, 2);
                                        $yearUnion->evaluation->mediaTrabajos = $mediaTrabajos;
                                    }
                                }
                                $aux = 0;
                                $aux2 = 0;
                            }
                        }
                        break;
                    case 'Actitud':
                        $yearUnion->evaluation->actitud = Task::where('year_union_id', $yearUnion->id)->where('type_id', $task_type->id)->with('users')->get();
                        foreach ($yearUnion->evaluation->actitud as $act) {
                            foreach ($act->users as $user) {
                                $notaActitud[$user->id][$act->id] = $user->pivot->value;
                                $yearUnion->evaluation->notaActitud = $notaActitud;
                            }
                        }
                        if ($yearUnion->evaluation->notaActitud != null) {
                            foreach ($yearUnion->evaluation->notaActitud as $user_id => $actitudNotas) {
                                foreach ($actitudNotas as $nota) {
                                    if ($nota < $task_type->pivot->nota_min_tarea && $nota != null) {
                                        $mediaActitud[$user_id] = "No llega a la nota minima tarea";
                                        $yearUnion->evaluation->mediaActitud = $mediaActitud;
                                        break;
                                    } else {
                                        if ($aux2 == count($yearUnion->evaluation->actitud)) {
                                            $aux2 = 0;
                                        }
                                        if ($nota != null) {
                                            $aux2++;
                                        }
                                        if ($aux2 == 0) {
                                            $aux2 = count($yearUnion->evaluation->actitud);
                                        }
                                        $aux += $nota;
                                        $mediaActitud[$user_id] = round($aux / $aux2, 2);
                                        $yearUnion->evaluation->mediaActitud = $mediaActitud;
                                    }
                                }
                                $aux = 0;
                                $aux2 = 0;
                            }
                        }
                        break;
                    case 'Recuperacion':
                        $yearUnion->evaluation->recuperacion = Task::where('year_union_id', $yearUnion->id)->where('type_id', $task_type->id)->with('users')->get();
                        foreach ($yearUnion->evaluation->recuperacion as $rec) {
                            foreach ($rec->users as $user) {
                                $notaRecuperacion[$user->id][$rec->id] = $user->pivot->value;
                                $yearUnion->evaluation->notaRecuperacion = $notaRecuperacion;
                            }
                        }
                        if ($yearUnion->evaluation->notaRecuperacion != null) {
                            foreach ($yearUnion->evaluation->notaRecuperacion as $user_id => $recuperacionNotas) {
                                foreach ($recuperacionNotas as $nota) {
                                    if ($nota < $task_type->pivot->nota_min_tarea && $nota != null) {
                                        $mediaRecuperacion[$user_id] = "No llega a la nota minima tarea";
                                        $yearUnion->evaluation->mediaRecuperacion = $mediaRecuperacion;
                                        break;
                                    } else {
                                        if ($aux2 == count($yearUnion->evaluation->evaluation)) {
                                            $aux2 = 0;
                                        }
                                        if ($nota != null) {
                                            $aux2++;
                                        }
                                        if ($aux2 == 0) {
                                            $aux2 = count($yearUnion->evaluation->evaluation);
                                        }
                                        $aux += $nota;
                                        $mediaRecuperacion[$user_id] = round($aux / $aux2, 2);
                                        $yearUnion->evaluation->mediaRecuperacion = $mediaRecuperacion;
                                    }
                                }
                                $aux = 0;
                                $aux2 = 0;
                            }
                        }
                        break;
                }
            }
        }

        return view('Notas.desglose', compact('yearUnions', 'subject', 'evaluation'));
    }

    public function evaluations(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'year' => 'required',
            'course' => 'required'
        ]);

        $subject = Subject::find($request->get('subject'));
        $course = Course::find($request->get('course'));
        $yearUnions = YearUnion::where('subject_id', $request->get('subject'))->where('year_id', $request->get('year'))->where('course_id', $request->get('course'))->get()->load('evaluation');
        $taskTypes = Type::all()->where('model', Task::class);

        foreach ($yearUnions as $yearUnion) {
            $yearUnion->evaluation = $yearUnion->evaluation;
            $yearUnion->percentages = $yearUnion->types;
            $yearUnion->users = $yearUnion->users;
            $yearUnion->tareas = $taskTypes;
            foreach ($yearUnion->users as $user) {
                if (count($taskTypes) > 0) {
                    $sumaFinal = 0;
                    $recuperado = 0;
                    foreach ($taskTypes as $task_type) {
                        // $tasks =  $user->tasks()->where('evaluation_id', $yearUnion->id)->where('type_id', $task_type->id)->get();
                        $tasks =  YearUnionUser::find($user->pivot->user_id)->tasks;
                        $suma = 0;
                        $tareas[$task_type->name] = 0;
                        $user->tareas = $tareas;
                        $resultados[$task_type->name] = false;
                        $user->suspendido = $resultados;
                        if (count($tasks) > 0) {
                            foreach ($tasks as $task) {
                                $suma += $task->pivot->value;
                            }
                            $suma = $suma / count($tasks);
                            foreach ($yearUnion->percentages as $percentage) {
                                if ($percentage->id == $task_type->id) {
                                    $tareas[$task_type->name] = round(($suma * $percentage->pivot->percentage) / 100, 2);
                                    $user->tareas = $tareas;
                                    $aux = round(($percentage->pivot->nota_media_minima * $percentage->pivot->percentage) / 100, 2);
                                    if ($tareas[$task_type->name] < $aux && $tareas[$task_type->name] != 0) {
                                        $resultados[$task_type->name] = true;
                                    }
                                    if ($task_type->name == 'Recuperacion' && $user->tareas[$task_type->name] != 0) {
                                        $user->nota_final = $user->tareas[$task_type->name];
                                        break;
                                    } else {
                                        $sumaFinal += $tareas[$task_type->name];
                                    }
                                }
                            }
                            $user->suspendido = $resultados;
                            foreach ($user->suspendido as $suspendido) {
                                if ($suspendido == false) {
                                    $user->nota_final = $sumaFinal;
                                } else {
                                    $user->nota_final = "No llega nota media minima " . $sumaFinal;
                                    break;
                                }
                            }
                        }
                    }
                } else {
                    //TODO: Controlar Error
                    return view('Notas.evaluations');
                }
            }
        }

        return view('Notas.evaluations', compact('subject', 'yearUnions', 'course'));
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
            'name' => 'required'
        ]);

        $subject = new Subject([
            'name' => $request->get('name'),
        ]);
        $subject->save();
        return redirect('/courses')->with('success', 'Subject saved!');
    }

    /**
     * Display the specified resource.  
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject = Subject::find($id);

        return view('subjects.show', compact('subject'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = Subject::find($id);
        return view('subjects.edit', compact('subject'));
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

        $request->validate([
            'name' => 'required'
        ]);
        $subject = Subject::find($id);
        $subject->name = $request->get('name');

        $subject->save();
        return redirect('/subjects')->with('Succes', 'Subject editado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::find($id);
        $subject->delete();

        return redirect('subjects')->with('success', 'Subject deleted!');
    }
}
