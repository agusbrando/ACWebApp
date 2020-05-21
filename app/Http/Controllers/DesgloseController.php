<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calification;
use App\Models\Task;
use App\Models\YearUnion;
use App\Models\Evaluation;
use Illuminate\Support\Facades\DB;

class DesgloseController extends Controller
{
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
            'evaluacion' => 'required'
        ]);

        $recuperacion = $request->get('recuperacion');

        foreach ($recuperacion as $user_id => $tasks) {
            foreach ($tasks as $task_id => $task_value) {
                $task = Task::find($task_id);
                $task->yearUnionUsers()->updateExistingPivot($user_id, [
                    'value' => $task_value
                ]);
            }
        }

        return redirect('evaluaciones/desglose/' . $request->get('subject') . '/' . $request->get('evaluacion'));
    }

    public function updateActitud(Request $request)
    {
        $request->validate([
            'actitud' => 'required',
            'subject' => 'required',
            'evaluacion' => 'required'
        ]);

        $actitud = $request->get('actitud');

        foreach ($actitud as $user_id => $tasks) {
            foreach ($tasks as $task_id => $task_value) {
                $task = Task::find($task_id);
                $task->yearUnionUsers()->updateExistingPivot($user_id, [
                    'value' => $task_value
                ]);
            }
        }

        return redirect('evaluaciones/desglose/' . $request->get('subject') . '/' . $request->get('evaluacion'));
    }

    public function updateNotes(Request $request)
    {
        $request->validate([
            'examenes' => 'required',
            'subject' => 'required',
            'evaluacion' => 'required',
        ]);

        $examenes = $request->get('examenes');

        foreach ($examenes as $user_id => $tasks) {
            foreach ($tasks as $task_id => $task_value) {
                $task = Task::find($task_id);
                $task->yearUnionUsers()->updateExistingPivot($user_id, [
                    'value' => $task_value
                ]);
            }
        }

        return redirect('evaluaciones/desglose/' . $request->get('subject') . '/' . $request->get('evaluacion'));
    }

    public function updateTrabajos(Request $request)
    {
        $request->validate([
            'trabajos' => 'required',
            'subject' => 'required',
            'evaluacion' => 'required'
        ]);

        $trabajos = $request->get('trabajos');

        foreach ($trabajos as $user_id => $tasks) {
            foreach ($tasks as $task_id => $task_value) {
                $task = Task::find($task_id);
                $task->yearUnionUsers()->updateExistingPivot($user_id, [
                    'value' => $task_value
                ]);
            }
        }

        return redirect('evaluaciones/desglose/' . $request->get('subject') . '/' . $request->get('evaluacion'));
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
