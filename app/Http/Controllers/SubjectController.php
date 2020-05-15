<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Task;
use App\Models\Course;
use App\Models\Subject;
use App\Models\YearUnion;
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

        foreach($yearUnions as $yearUnion){
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
