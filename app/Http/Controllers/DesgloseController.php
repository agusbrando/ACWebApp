<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Year;
use App\Models\Course;

use App\Models\Subject;
use App\Models\Task;
use App\Models\YearUnion;
use App\Models\Evaluation;
use App\Models\YearUnionUser;
use Illuminate\Support\Facades\DB;

class DesgloseController extends Controller
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

    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, $eval_id)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function updateRecuperacion(Request $request)
    {
        $request->validate([
            'recuperacion' => 'required',
            'subject' => 'required',
            'yearUnion' => 'required',
        ]);

        $recuperacion = $request->get('recuperacion');
        $yearUnion = YearUnion::find($request->get('yearUnion'));

        $request->session()->put('subject', $yearUnion->subject_id);
        $request->session()->put('year', $yearUnion->course_id);
        $request->session()->put('course', $yearUnion->year_id);
        $request->session()->put('evaluation', $yearUnion->evaluation_id);

        foreach ($recuperacion as $user_id => $tasks) {
            foreach ($tasks as $task_id => $task_value) {
                $yearUnionUser = YearUnionUser::where('user_id', $user_id)->where('year_union_id', $yearUnion->id)->first();
                $task = Task::find($task_id);
                $task->yearUnionUsers()->updateExistingPivot($yearUnionUser->id, [
                    'value' => $task_value
                ]);
            }
        }

        return redirect()->route('subjects.desglose', $request);
    }

    public function updateActitud(Request $request)
    {
        $request->validate([
            'actitud' => 'required',
            'subject' => 'required',
            'yearUnion' => 'required',
        ]);

        $actitud = $request->get('actitud');
        $yearUnion = YearUnion::find($request->get('yearUnion'));

        $request->session()->put('subject', $yearUnion->subject_id);
        $request->session()->put('year', $yearUnion->course_id);
        $request->session()->put('course', $yearUnion->year_id);
        $request->session()->put('evaluation', $yearUnion->evaluation_id);

        foreach ($actitud as $user_id => $tasks) {
            foreach ($tasks as $task_id => $task_value) {
                $yearUnionUser = YearUnionUser::where('user_id', $user_id)->where('year_union_id', $yearUnion->id)->first();
                $task = Task::find($task_id);
                $task->yearUnionUsers()->updateExistingPivot($yearUnionUser->id, [
                    'value' => $task_value
                ]);
            }
        }

        return redirect()->route('subjects.desglose', $request);
    }

    public function updateNotes(Request $request)
    {
        $request->validate([
            'examenes' => 'required',
            'subject' => 'required',
            'yearUnion' => 'required',
        ]);

        $examenes = $request->get('examenes');
        $yearUnion = YearUnion::find($request->get('yearUnion'));

        $examenes = $request->get('examenes');
        $request->session()->put('subject', $yearUnion->subject_id);
        $request->session()->put('year', $yearUnion->course_id);
        $request->session()->put('course', $yearUnion->year_id);
        $request->session()->put('evaluation', $yearUnion->evaluation_id);

        foreach ($examenes as $user_id => $tasks) {
            foreach ($tasks as $task_id => $task_value) {
                $yearUnionUser = YearUnionUser::where('user_id', $user_id)->where('year_union_id', $yearUnion->id)->first();
                $task = Task::find($task_id);
                $task->yearUnionUsers()->updateExistingPivot($yearUnionUser->id, [
                    'value' => $task_value
                ]);
            }
        }

        return redirect()->route('subjects.desglose', $request);
    }

    public function updateTrabajos(Request $request)
    {
        $request->validate([
            'trabajos' => 'required',
            'subject' => 'required',
            'yearUnion' => 'required',
        ]);

        $trabajos = $request->get('trabajos');
        $yearUnion = YearUnion::find($request->get('yearUnion'));

        $request->session()->put('subject', $yearUnion->subject_id);
        $request->session()->put('year', $yearUnion->course_id);
        $request->session()->put('course', $yearUnion->year_id);
        $request->session()->put('evaluation', $yearUnion->evaluation_id);

        foreach ($trabajos as $user_id => $tasks) {
            foreach ($tasks as $task_id => $task_value) {
                $yearUnionUser = YearUnionUser::where('user_id', $user_id)->where('year_union_id', $yearUnion->id)->first();
                $task = Task::find($task_id);
                $task->yearUnionUsers()->updateExistingPivot($yearUnionUser->id, [
                    'value' => $task_value
                ]);
            }
        }

        return redirect()->route('subjects.desglose', $request);
    }

    //TODO pasar a taskController
    public function eliminar($id)
    {
        $evaluacion = YearUnion::find($id)->load('evaluation');
        $tasks = $evaluacion->tasks()->get();
        $eval = Evaluation::find($evaluacion->evaluation_id);

        return view('Notas.eliminarTarea', compact('tasks', 'evaluacion', 'eval'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($task_id, $yearUnion_id)
    {
        $evaluacion = YearUnion::find($yearUnion_id)->load('evaluation');
        $task = Task::find($task_id);

        $usuarios = $evaluacion->users;
        foreach ($usuarios as $user) {
            $task->yearUnionUsers()->detach($user->id);
        }
        $task->delete();

        //TODO hacer redirect bien
        return redirect()->route('tareas/eliminar', ['id' => $task->id]);
    }
}
