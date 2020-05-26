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

        if ($request->session()->has('subject') && $request->session()->has('year') && $request->session()->has('course') && $request->session()->has('evaluation')) {
            $year = Year::find($request->session()->get('year'));
            $subject = Subject::find($request->session()->get('subject'));
            $course = Course::find($request->session()->get('course'));
            $eval = Evaluation::find($request->session()->get('evaluation'));
            $evaluation = YearUnion::where('subject_id', $subject->id)->where('year_id', $year->id)->where('course_id', $course->id)->where('evaluation_id', $eval->id)->first()->load('evaluation');
            $taskTypes = $evaluation->types;
        } else {
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
        }


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
        $suspendido = false;

        $evaluation->percentages = $evaluation->types;

        foreach ($taskTypes as $task_type) {
            $notaMin[$task_type->name] = $task_type->pivot->min_grade_task;
            $evaluation->notaMin = $notaMin;
            $name = $task_type->name;
            switch ($name) {
                case 'Examenes':
                    $evaluation->parciales = $evaluation->tasks()->where('type_id', $task_type->id)->get();
                    foreach ($evaluation->parciales as $parcial) {
                        $parcial->yearUnionUsers = $parcial->yearUnionUsers;
                        foreach ($parcial->yearUnionUsers as $yearUnionUser) {
                            $notaParciales[$yearUnionUser->user->id][$parcial->id] = $yearUnionUser->pivot->value;
                            $evaluation->notaParciales = $notaParciales;
                        }
                    }
                    if ($evaluation->notaParciales != null) {
                        foreach ($evaluation->notaParciales as $user_id => $examenes) {
                            foreach ($examenes as $nota) {
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
                                $notaFinal = round($aux / $aux2, 2);
                                $mediaParciales[$user_id] = $notaFinal;
                                $evaluation->mediaParciales = $mediaParciales;
                                $mediaFinalExamenes[$user_id] = $notaFinal;
                                $evaluation->mediaFinalExamenes = $mediaFinalExamenes;
                                if ($nota < $task_type->pivot->min_grade_task && $nota != null) {
                                    $suspendido = true;
                                }
                            }
                            if ($suspendido) {
                                $mediaFinalExamenes[$user_id] = 3;
                                $evaluation->mediaFinalExamenes = $mediaFinalExamenes;
                            }
                            if ($notaFinal < $task_type->pivot->average_grade_task && $nota != null) {
                                $mediaParciales[$user_id] = "No llega a la media " . $notaFinal;
                                $evaluation->mediaParciales = $mediaParciales;
                            }
                            $aux = 0;
                            $aux2 = 0;
                            $suspendido = false;
                        }
                    }

                    break;
                case 'Trabajos':
                    $evaluation->trabajos = $evaluation->tasks()->where('type_id', $task_type->id)->get();
                    foreach ($evaluation->trabajos as $trabajo) {
                        foreach ($trabajo->yearUnionUsers as $yearUnionUser) {
                            $notaTrabajos[$yearUnionUser->user->id][$trabajo->id] = $yearUnionUser->pivot->value;
                            $evaluation->notaTrabajos = $notaTrabajos;
                        }
                    }
                    if ($evaluation->notaTrabajos != null) {
                        foreach ($evaluation->notaTrabajos as $user_id => $trabajosNotas) {
                            foreach ($trabajosNotas as $nota) {

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
                                $notaFinal = round($aux / $aux2, 2);
                                $mediaTrabajos[$user_id] = $notaFinal;
                                $evaluation->mediaTrabajos = $mediaTrabajos;
                                $mediaFinalTrabajos[$user_id] = $notaFinal;
                                $evaluation->mediaFinalTrabajos = $mediaFinalTrabajos;
                                if ($nota < $task_type->pivot->min_grade_task && $nota != null) {
                                    $suspendido = true;
                                }
                            }
                            if ($suspendido) {
                                $mediaFinalTrabajos[$user_id] = 3;
                                $evaluation->mediaFinalTrabajos = $mediaFinalTrabajos;
                            }
                            if ($notaFinal < $task_type->pivot->average_grade_task && $nota != null) {
                                $mediaTrabajos[$user_id] = "No llega a la media " . $notaFinal;
                                $evaluation->mediaTrabajos = $mediaTrabajos;
                            }
                            $aux = 0;
                            $aux2 = 0;
                            $suspendido = false;
                        }
                    }
                    break;
                case 'Actitud':
                    $evaluation->actitud = $evaluation->tasks()->where('type_id', $task_type->id)->get();
                    foreach ($evaluation->actitud as $act) {
                        foreach ($act->yearUnionUsers as $yearUnionUser) {
                            $notaActitud[$yearUnionUser->user->id][$act->id] = $yearUnionUser->pivot->value;
                            $evaluation->notaActitud = $notaActitud;
                        }
                    }
                    if ($evaluation->notaActitud != null) {
                        foreach ($evaluation->notaActitud as $user_id => $actitudNotas) {
                            foreach ($actitudNotas as $nota) {

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
                                $notaFinal = round($aux / $aux2, 2);
                                $mediaActitud[$user_id] = $notaFinal;
                                $evaluation->mediaActitud = $mediaActitud;
                                $mediaFinalActitud[$user_id] = $notaFinal;
                                $evaluation->mediaFinalActitud = $mediaFinalActitud;
                                if ($nota < $task_type->pivot->min_grade_task && $nota != null) {
                                    $suspendido = true;
                                }
                            }
                            if ($suspendido) {
                                $mediaFinalActitud[$user_id] = 3;
                                $evaluation->mediaFinalActitud = $mediaFinalActitud;
                            }
                            if ($notaFinal < $task_type->pivot->average_grade_task && $nota != null) {
                                $mediaActitud[$user_id] = "No llega a la media " . $notaFinal;
                                $evaluation->mediaActitud = $mediaActitud;
                            }
                            $aux = 0;
                            $aux2 = 0;
                            $suspendido = false;
                        }
                    }
                    break;
                case 'Recuperacion':
                    $evaluation->recuperacion = $evaluation->tasks()->where('type_id', $task_type->id)->get();
                    foreach ($evaluation->recuperacion as $rec) {
                        foreach ($rec->yearUnionUsers as $yearUnionUser) {
                            $notaRecuperacion[$yearUnionUser->user->id][$rec->id] = $yearUnionUser->pivot->value;
                            $evaluation->notaRecuperacion = $notaRecuperacion;
                        }
                    }
                    if ($evaluation->notaRecuperacion != null) {
                        foreach ($evaluation->notaRecuperacion as $user_id => $recuperacionNotas) {
                            foreach ($recuperacionNotas as $nota) {

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
                                $notaFinal = round($aux / $aux2, 2);
                                $mediaRecuperacion[$user_id] = $notaFinal;
                                $evaluation->mediaRecuperacion = $mediaRecuperacion;
                                $mediaFinalRecuperacion[$user_id] = $notaFinal;
                                $evaluation->mediaFinalRecuperacion = $mediaFinalRecuperacion;
                                if ($nota < $task_type->pivot->min_grade_task && $nota != null) {
                                    $suspendido = true;
                                }
                            }
                            if ($suspendido) {
                                $mediaFinalRecuperacion[$user_id] = 3;
                                $evaluation->mediaFinalRecuperacion = $mediaFinalRecuperacion;
                            }
                            if ($notaFinal < $task_type->pivot->average_grade_task && $nota != null) {
                                $mediaRecuperacion[$user_id] = "No llega a la media " . $notaFinal;
                                $evaluation->mediaRecuperacion = $mediaRecuperacion;
                            }
                            $aux = 0;
                            $aux2 = 0;
                            $suspendido = false;
                        }
                    }
                    break;
            }
        }

        return view('Notas.desglose', compact('evaluation', 'subject', 'eval', 'year', 'course'));
    }

    /**
     * Muestra las notas medias de los usuarios con sus 
     * notas finales aplicando los porcentajes en una tabla.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $subject_id
     * @return view Notas.evaluations
     */
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
            $users = $yearUnion->users;
            foreach ($yearUnion->users as $user) {
                if (count($taskTypes) > 0) {
                    $sumaFinal = 0;
                    $recuperado = 0;
                    foreach ($taskTypes as $task_type) {
                        $yearUnionUser =  YearUnionUser::where('user_id', $user->id)->where('year_union_id', $yearUnion->id)->first();
                        $tasks =  $yearUnionUser->tasks()->where('type_id', $task_type->id)->get();
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
                                    $notaMinTarea = round(($percentage->pivot->min_grade_task * $percentage->pivot->percentage) / 100, 2);
                                    if ($tareas[$task_type->name] < $notaMinTarea && $tareas[$task_type->name] != 0) {
                                        $resultados[$task_type->name] = true;
                                    }
                                    if ($task_type->name == 'Recuperacion' && $user->tareas[$task_type->name] != 0) {
                                        $user->boletin = $user->tareas[$task_type->name];
                                        $recuperado = true;
                                        break;
                                    } else {
                                        $sumaFinal += $tareas[$task_type->name];
                                    }
                                }
                            }
                            $user->suspendido = $resultados;
                            foreach ($user->suspendido as $suspendido) {
                                if ($suspendido == false && $recuperado != true) {
                                    $user->nota_final = $sumaFinal;
                                } else if ($suspendido == true && $recuperado != true) {
                                    $user->nota_final = "No llega nota media minima " . $sumaFinal;
                                    break;
                                }
                            }
                            if ($recuperado) {
                                $user->nota_final = $sumaFinal;
                            } else {
                                $user->boletin = $sumaFinal;
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
     * Muestra la informacion de una asignatura  
     *
     * @param  int  $id
     * @return view Subjects.Show
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
