<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use App\Models\Type;
use App\Models\Subject;
use App\Models\Evaluation;
use App\Models\Calification;
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
    public function create($id)
    {
        $subject = Subject::find($id);
        $evaluaciones = $subject->evaluations()->orderBy('name', 'asc')->get();
        $tipos = Type::all()->where('model', Task::class);

        return view('Notas.crearTarea', compact('subject', 'evaluaciones', 'tipos'));
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
            'name' => 'required',
            'evaluaciones' => 'required',
            'type' => 'required',
            'subject' => 'required'
        ]);

        $evaluaciones = $request->get('evaluaciones');

        foreach ($evaluaciones as $eval) {
            $task = new Task([
                'evaluation_id' => $eval,
                'type_id' => $request->get('type'),
                'name' => $request->get('name')
            ]);
            $task->save();
            $this->storeNotes(Evaluation::find($eval), $task);
        }

        return redirect('asignaturas/'.$request->get('subject'));

    }

    protected function storeNotes(Evaluation $eval, Task $task)
    {
        foreach ($eval->users as $user) {
            $calification = new Calification([
                'user_id' => $user->id,
                'task_id' => $task->id,
                'value' => null
            ]);
            $calification->save();
        }
    }

    // public function storeTrabajos(Request $request)
    // {
    //     $request->validate([
    //         'trabajos' => 'required',
    //         'subject' => 'required',
    //         'evaluacion' => 'required'
    //     ]);

    //     $trabajos = $request->get('trabajos');


    //     foreach ($trabajos as $user_id => $tasks) {
    //         foreach ($tasks as $task_id => $task_value) {
    //             $calification = new Calification([
    //                 'user_id' => $user_id,
    //                 'task_id' => $task_id,
    //                 'value' => $task_value
    //             ]);
    //             $calification->save();
    //         }
    //     }

    //     return redirect('evaluaciones/desglose/'.$request->get('subject').'/'.$request->get('evaluacion'));
    // }

    // public function storeActitud(Request $request)
    // {
    //     $request->validate([
    //         'actitud' => 'required',
    //         'subject' => 'required',
    //         'evaluacion' => 'required'
    //     ]);

    //     $actitud = $request->get('actitud');


    //     foreach ($actitud as $user_id => $tasks) {
    //         foreach ($tasks as $task_id => $task_value) {
    //             $calification = new Calification([
    //                 'user_id' => $user_id,
    //                 'task_id' => $task_id,
    //                 'value' => $task_value
    //             ]);
    //             $calification->save();
    //         }
    //     }

    //     return redirect('evaluaciones/desglose/'.$request->get('subject').'/'.$request->get('evaluacion'));
    // }

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
                $task->users()->updateExistingPivot($user_id,[
                    'value' => $task_value
                ]);
            }
        }

        return redirect('evaluaciones/desglose/'.$request->get('subject').'/'.$request->get('evaluacion'));
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
                $task->users()->updateExistingPivot($user_id,[
                    'value' => $task_value
                ]);
            }
        }

        return redirect('evaluaciones/desglose/'.$request->get('subject').'/'.$request->get('evaluacion'));
    }

    public function updateNotes(Request $request)
    {
        $request->validate([
            'examenes' => 'required',
            'subject' => 'required',
            'evaluacion' => 'required'
        ]);

        $examenes = $request->get('examenes');        

        foreach ($examenes as $user_id => $tasks) {
            foreach ($tasks as $task_id => $task_value) {
                $task = Task::find($task_id);
                $task->users()->updateExistingPivot($user_id,[
                    'value' => $task_value
                ]);
            }
        }

        return redirect('evaluaciones/desglose/'.$request->get('subject').'/'.$request->get('evaluacion'));
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
                $task->users()->updateExistingPivot($user_id,[
                    'value' => $task_value
                ]);
            }
        }

        return redirect('evaluaciones/desglose/'.$request->get('subject').'/'.$request->get('evaluacion'));
    }

    public function eliminar($id)
    {
        $tasks = Task::all();

        $subject = Subject::find($id);

        return view('Notas.eliminarTarea', compact('tasks', 'subject'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $subject_id)
    {
        $task = Task::find($id);

        $task->delete();

        return redirect('evaluaciones/desglose/'.$subject_id.'/'.$task->evaluation->id);
    }
}
