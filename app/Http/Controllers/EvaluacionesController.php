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
        $aux2 = 0;

        foreach ($tasksTypes as $task_type) {
            $name = $task_type->name;
            switch ($name) {
                case 'Examenes':
                    $parciales = Task::where('type_id', $task_type->id)->where('evaluation_id', $evaluation->id)->with('users')->get();
                    foreach ($parciales as $parcial) {
                        foreach ($parcial->users as $user) {
                            $notaParciales[$user->id][$parcial->id] = $user->pivot->value;
                        }
                    }
                    if ($notaParciales != null) {
                        foreach ($notaParciales as $user_id => $examenes) {
                            foreach ($examenes as $nota) {
                                if($aux2 == count($parciales)){
                                    $aux2 = 0;
                                }
                                if ($nota != null) {
                                    $aux2 ++;
                                }
                                if($aux2 == 0){
                                    $aux2 = count($parciales);
                                }
                                $aux += $nota;
                                $mediaParciales[$user_id] = round($aux / $aux2, 2);
                            }
                            $aux = 0;
                            $aux2 = 0;
                        }
                    }
                    
                    break;
                case 'Trabajos':
                    $trabajos = Task::where('type_id', $task_type->id)->where('evaluation_id', $evaluation->id)->with('users')->get();
                    foreach ($trabajos as $trabajo) {
                        foreach ($trabajo->users as $user) {
                            $notaTrabajos[$user->id][$trabajo->id] = $user->pivot->value;
                        }
                    }
                    if ($notaTrabajos != null) {
                        foreach ($notaTrabajos as $user_id => $trabajosNotas) {
                            foreach ($trabajosNotas as $nota) {
                                if($aux2 == count($trabajos)){
                                    $aux2 = 0;
                                }
                                if ($nota != null) {
                                    $aux2 ++;
                                }
                                if($aux2 == 0){
                                    $aux2 = count($trabajos);
                                }
                                $aux += $nota;
                                $mediaTrabajos[$user_id] = round($aux / $aux2, 2);
                            }
                            $aux = 0;
                            $aux2 = 0;
                        }
                    }
                    break;
                case 'Actitud':
                    $actitud = Task::where('type_id', $task_type->id)->where('evaluation_id', $evaluation->id)->with('users')->get();
                    foreach ($actitud as $act) {
                        foreach ($act->users as $user) {
                            $notaActitud[$user->id][$act->id] = $user->pivot->value;
                        }
                    }
                    if ($notaActitud != null) {
                        foreach ($notaActitud as $user_id => $actitudNotas) {
                            foreach ($actitudNotas as $nota) {
                                if($aux2 == count($actitud)){
                                    $aux2 = 0;
                                }
                                if ($nota != null) {
                                    $aux2 ++;
                                }
                                if($aux2 == 0){
                                    $aux2 = count($actitud);
                                }
                                $aux += $nota;
                                $mediaActitud[$user_id] = round($aux / $aux2, 2);
                            }
                            $aux = 0;
                            $aux2 = 0;
                        }
                    }
                    break;
            }
        }

        return view('Notas.desglose', compact('evaluation', 'users', 'subject', 'parciales', 'trabajos', 'actitud', 'notaParciales', 'notaTrabajos', 'notaActitud', 'mediaParciales', 'mediaTrabajos', 'mediaActitud'));
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
