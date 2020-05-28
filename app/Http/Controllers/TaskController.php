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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $yearUnion = YearUnion::find($id);
        $evaluaciones = YearUnion::where('subject_id', $yearUnion->subject_id)->where('year_id', $yearUnion->year_id)->where('course_id', $yearUnion->course_id)->get()->load('evaluation');
        $tipos = Type::all()->where('model', Task::class);

        foreach ($evaluaciones as $eval) {
            $eval->evaluation = $eval->evaluation;
        }

        return view('Notas.crearTarea', compact('yearUnion', 'evaluaciones', 'tipos'));
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
            'type' => 'required',
            'yearUnion' => 'required'
        ]);

        $yearUnion = YearUnion::find($request->get('yearUnion'));

        $request->session()->put('subject', $yearUnion->subject_id);
        $request->session()->put('year', $yearUnion->course_id);
        $request->session()->put('course', $yearUnion->year_id);
        $request->session()->put('evaluation', $yearUnion->evaluation_id);

        $task = new Task([
            'year_union_id' => $yearUnion->id,
            'type_id' => $request->get('type'),
            'name' => $request->get('name')
        ]);
        $task->save();
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
            $task->yearUnionUsers()->detach($user->pivot->id);
        }
        $task->delete();

        
        return redirect()->route('tasks.eliminar', $evaluacion->id);
    }
}
