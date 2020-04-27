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
    public function index(){
        $titulo = "Examenes";
        $users = DB::table('users')->where('role_id', '=', 4)->get();
        return view('Notas.desglose', compact('users','titulo'));
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

        foreach($evaluaciones as $eval){
            $type = new Task([
                'evaluation_id' => $eval,
                'type_id' => $request->get('type'),
                'name' => $request->get('name')
            ]);
            $type->save();
        }

        return redirect('evaluaciones/'.$request->get('subject'));
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
        $task->users()->detach(1);
        $task->delete();

        $subject = Subject::find($subject_id);

        return redirect('evaluaciones/'.$subject->id);
    }
}
