<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Type;
use App\Models\Subject;
use App\Models\Evaluation;
use App\Models\Calification;
use App\Models\YearUnion;
use App\Models\YearUnionUser;

class TaskController extends Controller
{
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

        //TODO JAVI hacer funcional store tareas
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'yearUnion' => 'required'
        ]);

        $yearUnion = YearUnion::find($request->get('yearUnion'));

        $task = new Task([
            'year_union_id' => $yearUnion->id,
            'type_id' => $request->get('type'),
            'name' => $request->get('name')
        ]);
        $task->save();
        $this->storeNotes($yearUnion, $task);


        return redirect('subjects/evaluations/' . $yearUnion->subject_id);
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
