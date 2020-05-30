<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Type;
use App\Models\Subject;
use App\Models\Evaluation;
use App\Models\Calification;
use App\Models\YearUnion;
use Illuminate\Support\Facades\Auth;
use App\Models\YearUnionUser;

class TaskController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Muestra un formulario para crear una tarea.
     *
     * @param int id.
     * @return view Notas.crearTarea.
     */
    public function create($id)
    {
        //Se busca el yearUnion mediante el id pasado como parametro.
        $yearUnion = YearUnion::find($id);
        //Se buscan todos los tipos de tareas que existen.
        $tipos = Type::all()->where('model', Task::class);

        return view('Notas.crearTarea', compact('yearUnion', 'tipos'));
    }

    /**
     * Se alamacena una tarea en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request.
     * @return redirect subects.desglose.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'yearUnion' => 'required'
        ]);
        //Se recoge el yearUnion desde $request
        $yearUnion = YearUnion::find($request->get('yearUnion'));
        //Nos guardamos las variables que vienen desde la session
        $request->session()->put('subject', $yearUnion->subject_id);
        $request->session()->put('year', $yearUnion->course_id);
        $request->session()->put('course', $yearUnion->year_id);
        $request->session()->put('evaluation', $yearUnion->evaluation_id);
        //Se crea la tarea
        $task = new Task([
            'year_union_id' => $yearUnion->id,
            'type_id' => $request->get('type'),
            'name' => $request->get('name')
        ]);
        $task->save();
        //Funcion creada para crear una calificacion vacia a casa usuario
        $this->storeNotes($yearUnion, $task);


        return redirect()->route('subjects.desglose', $request);
    }

    protected function storeNotes($yearUnion, Task $task)
    {
        foreach ($yearUnion->users as $user) {
            $yearUnionUser = YearUnionUser::where('user_id', $user->id)->where('year_union_id', $yearUnion->id)->first();
            $calification = new Calification([
                'task_id' => $task->id,
                'year_user_id' =>  $yearUnionUser->id,
                'value' => null
            ]);
            $calification->save();
        }
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
        $evaluacion = YearUnion::find($id)->load('evaluation');
        $tasks = $evaluacion->tasks()->get();
        $eval = Evaluation::find($evaluacion->evaluation_id);

        return view('Notas.eliminarTarea', compact('tasks', 'evaluacion', 'eval'));
    }

    /**
     * Elimina una tarea de la base de datos.
     *
     * @param  int  $task_id
     * @param  int  $yearUnion_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($task_id, $yearUnion_id)
    {
        //Buscamos la la evaluacion de la tarea.
        $evaluacion = YearUnion::find($yearUnion_id)->load('evaluation');
        //Buscamos la la tarea que queremos eliminar.
        $task = Task::find($task_id);
        //Buscamos los usuarios de esa evaluacion para borrar las calificaciones
        //que tienen en la base de datos.
        $usuarios = $evaluacion->users;
        foreach ($usuarios as $user) {
            //eliminamos las calificaciones.
            $task->yearUnionUsers()->detach($user->pivot->id);
        }
        //eliminamos la tarea.
        $task->delete();
        
        return redirect()->route('tasks.eliminar', $evaluacion->id);
    }
}
