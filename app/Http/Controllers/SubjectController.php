<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Task;
use App\Models\Year;
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
            'evaluation' => 'required',
        ]);

        $year = Year::find($request->get('year'));
        $subject = Subject::find($request->get('subject'));
        $course = Course::find($request->get('course'));
        $eval = Evaluation::find($request->get('evaluation'));
        $evaluation = YearUnion::where('subject_id', $request->get('subject'))->where('year_id', $request->get('year'))->where('course_id', $request->get('course'))->where('evaluation_id', $request->get('evaluation'))->first()->load('evaluation');
        $taskTypes = $evaluation->types;

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

        $evaluation->percentages = $evaluation->types;

        foreach ($taskTypes as $task_type) {
            $name = $task_type->name;
            switch ($name) {
                case 'Examenes':
                    $evaluation->parciales = $evaluation->tasks()->where('type_id', $task_type->id)->get();
                    foreach ($evaluation->parciales as $parcial) {
                        $parcial->yearUnionUsers = $parcial->yearUnionUsers;
                        foreach ($parcial->yearUnionUsers as $yearUnionUser) {
                            $notaParciales[$yearUnionUser->id][$parcial->id] = $yearUnionUser->pivot->value;
                            $evaluation->notaParciales = $notaParciales;
                        }
                    }
                    if ($evaluation->notaParciales != null) {
                        foreach ($evaluation->notaParciales as $user_id => $examenes) {
                            foreach ($examenes as $nota) {
                                if ($nota < $task_type->pivot->min_grade_task && $nota != null) {
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
                    $evaluation->trabajos = $evaluation->tasks()->where('type_id', $task_type->id)->get();
                    foreach ($evaluation->trabajos as $trabajo) {
                        foreach ($trabajo->yearUnionUsers as $yearUnionUser) {
                            $notaTrabajos[$yearUnionUser->id][$trabajo->id] = $yearUnionUser->pivot->value;
                            $evaluation->notaTrabajos = $notaTrabajos;
                        }
                    }
                    if ($evaluation->notaTrabajos != null) {
                        foreach ($evaluation->notaTrabajos as $user_id => $trabajosNotas) {
                            foreach ($trabajosNotas as $nota) {
                                if ($nota < $task_type->pivot->min_grade_task && $nota != null) {
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
                                    if ($nota != null) {
                                        $aux += $nota;
                                        $mediaTrabajos[$user_id] = round($aux / $aux2, 2);
                                        $evaluation->mediaTrabajos = $mediaTrabajos;
                                    } else {
                                        $mediaTrabajos[$user_id] = 0;
                                    }
                                }
                            }
                            $aux = 0;
                            $aux2 = 0;
                        }
                    }
                    break;
                case 'Actitud':
                    $evaluation->actitud = $evaluation->tasks()->where('type_id', $task_type->id)->get();
                    foreach ($evaluation->actitud as $act) {
                        foreach ($act->yearUnionUsers as $yearUnionUser) {
                            $notaActitud[$yearUnionUser->id][$act->id] = $yearUnionUser->pivot->value;
                            $evaluation->notaActitud = $notaActitud;
                        }
                    }
                    if ($evaluation->notaActitud != null) {
                        foreach ($evaluation->notaActitud as $user_id => $actitudNotas) {
                            foreach ($actitudNotas as $nota) {
                                if ($nota < $task_type->pivot->min_grade_task && $nota != null) {
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
                                    if ($nota != null) {
                                        $aux += $nota;
                                        $mediaActitud[$user_id] = round($aux / $aux2, 2);
                                        $evaluation->mediaActitud = $mediaActitud;
                                    } else {
                                        $mediaActitud[$user_id] = 0;
                                    }
                                }
                            }
                            $aux = 0;
                            $aux2 = 0;
                        }
                    }
                    break;
                case 'Recuperacion':
                    $evaluation->recuperacion = $evaluation->tasks()->where('type_id', $task_type->id)->get();
                    foreach ($evaluation->recuperacion as $rec) {
                        foreach ($rec->yearUnionUsers as $yearUnionUser) {
                            $notaRecuperacion[$yearUnionUser->id][$rec->id] = $yearUnionUser->user->pivot->value;
                            $evaluation->notaRecuperacion = $notaRecuperacion;
                        }
                    }
                    if ($evaluation->notaRecuperacion != null) {
                        foreach ($evaluation->notaRecuperacion as $user_id => $recuperacionNotas) {
                            foreach ($recuperacionNotas as $nota) {
                                if ($nota < $task_type->pivot->min_grade_task && $nota != null) {
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
                                    if ($nota != null) {
                                        $aux += $nota;
                                        $mediaRecuperacion[$user_id] = round($aux / $aux2, 2);
                                        $evaluation->mediaRecuperacion = $mediaRecuperacion;
                                    } else {
                                        $mediaRecuperacion[$user_id] = 0;
                                    }
                                }
                            }
                            $aux = 0;
                            $aux2 = 0;
                        }
                    }
                    break;
            }
        }

        return view('Notas.desglose', compact('evaluation', 'subject', 'eval', 'year', 'course'));
    }

    public function evaluations(Request $request, $subject_id)
    {

        $request->session()->put('subject_id', $subject_id);
        if ($request->session()->has('course_id') && $request->session()->has('year_id')) {
            $course_id = $request->session()->get('course_id');
            $year_id = $request->session()->get('year_id');
        } else {
            // TODO devolver error
        }

        $year = Year::find($year_id);
        $subject = Subject::find($subject_id);
        $course = Course::find($course_id);
        $yearUnions = YearUnion::where('subject_id', $subject_id)->where('year_id', $year_id)->where('course_id', $course_id)->get()->load('evaluation');
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

        return view('Notas.evaluations', compact('subject', 'yearUnions', 'course', 'year'));
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
