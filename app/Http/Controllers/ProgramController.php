<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Program;
use App\Models\Unit;
use App\Models\User;
use App\Models\Evaluable;

use Illuminate\Support\Facades\DB;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::all();
        $profesores = DB::table('users')->where('role_id', 2)->get();
        $subjects = Subject::all();
        return view('programs.index',compact('programs','profesores','subjects'));
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
        $request->validate([
            'professor_id'=>'required',
            'user_id'=>'required',
            'subject_id'=>'required'
        ]);

        $profesor = User::find($request->get('professor_id'));
        $responsable = User::find($request->get('user_id'));
        $asignatura = Subject::find($request->get('subject_id'));

        $program = new Program([
            'date_check'=>now(),
            'notes'=>'Introduce tus observaciones aqui.'
        ]);
        $program->professor()->associate($profesor);
        $program->responsable()->associate($responsable);
        $program->subject()->associate($asignatura);

        $program->save();
        return redirect('/programs');
    }
    public function storeUnit(Request $request, $id){
        $program = Program::findorfail($id);
        $request->validate([
            'name'=>'required',
            'expected_date_start'=>'required',
            'expected_date_end'=>'required',
            'expected_eval'=>'required'
        ]);

        $unit = new Unit([
            'name' => $request->get('name'),
            'expected_date_start' => $request->get('expected_date_start'),
            'expected_date_end' => $request->get('expected_date_end'),
            'expected_eval'=>$request->get('expected_eval')
        ]);
        
        $program->units()->save($unit);
        return redirect('/programs/'.$id);
    }
    public function updateUnit(Request $request,$program_id, $id){

        $request->validate([
            'name'=>'required',
            'expected_date_start'=>'required',
            'expected_date_end'=>'required',
            'expected_eval'=>'required'
        ]);

        $unit = Unit::find($id);

        $unit->name = $request->get('name');
        $unit->expected_date_start= $request->get('expected_date_start');
        $unit->expected_date_end = $request->get('expected_date_end');
        $unit->expected_eval = $request->get('expected_eval');
        $unit->date_start = $request->get('date_start');
        $unit->date_end = $request->get('date_end');
        $unit->eval = $request->get('eval');
        $unit->notes = $request->get('notes');
        $unit->improvements = $request->get('improvements');
        $unit->save();
        
        $program_id = $unit->program->id;

        return redirect('/programs/'.$program_id);
    }
    public function storeAspecto(Request $request, $id){
        $program = Program::findorfail($id);

        $request->validate([
            'name'=>'required',
            'description'=>'required'
        ]);
        $name = $request->get('name');
        $description = $request->get('description');

        $aspecto = Evaluable::where('name',$name)->first();

        if($aspecto == null){
            $aspecto = new Evaluable([
                'name' => $name
            ]);
            $aspecto->save();
        }
        
        $program->evaluables()->attach($aspecto->id,['description'=>$description]);
        
        return redirect('/programs/'.$id);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $program = Program::findorfail($id);
        $evaluables = Evaluable::all();
        return view('programs.show',compact('program','evaluables'));
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
