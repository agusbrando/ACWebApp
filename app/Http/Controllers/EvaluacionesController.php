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
        $tasksTypes = Type::all()->where('model', Task::class);
        $evaluation = Evaluation::find($evaluation_id);
        $users = $evaluation->users;

        $notaParciales = null;
        $notaTrabajos = null;
        $notaActitud = null;

        $mediaParciales = null;
        $mediaTrabajos = null;
        $mediaActitud = null;

        $aux = 0;

        foreach ($tasksTypes as $task_type) {
            $id = $task_type->id;
            switch ($id) {
                case 8:
                    $parciales = Task::where('type_id', $task_type->id)->where('evaluation_id', $evaluation->id)->with('users')->get();
                    foreach ($parciales as $parcial) {
                        foreach ($parcial->users as $user) {
                            $notaParciales[$user->id][$parcial->id] = $user->pivot->value;
                        }
                    }
                    if ($notaParciales != null) {
                        foreach ($notaParciales as $user_id => $examenes) {
                            foreach ($examenes as $nota) {
                                $aux += $nota;
                                $mediaParciales[$user_id] = $aux / count($parciales);
                            }
                            $aux = 0;
                        }
                    }
                    break;
                case 9:
                    $trabajos = Task::where('type_id', $task_type->id)->where('evaluation_id', $evaluation->id)->with('users')->get();
                    foreach ($trabajos as $trabajo) {
                        foreach ($trabajo->users as $user) {
                            $notaTrabajos[$user->id][$trabajo->id] = $user->pivot->value;
                        }
                    }
                    break;
                case 10:
                    $actitud = Task::where('type_id', $task_type->id)->where('evaluation_id', $evaluation->id)->with('users')->get();
                    foreach ($actitud as $act) {
                        foreach ($act->users as $user) {
                            $notaActitud[$user->id][$act->id] = $user->pivot->value;
                        }
                    }
                    break;
            }
        }

        return view('Notas.desglose', compact('evaluation', 'users', 'subject', 'parciales', 'trabajos', 'actitud', 'notaParciales', 'notaTrabajos', 'notaActitud', 'mediaParciales'));
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
