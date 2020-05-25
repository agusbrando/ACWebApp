<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Program;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $subjects = Subject::all();
        return view('units.index',compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create($program_id)
    {
        $program = Program::find($program_id);
        return view('units.create', compact('program'));
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
            'name'=>'required',
            'expected_date_start'=>'required',
            'expected_date_end'=>'required',
            'expected_eval'=>'required'
        ]);

        $unit = new Unit([
            'name' => $request->get('name'),
            'expected_date_start' => $request->get('expected_date_start'),
            'expected_date_end' => $request->get('expected_date_end'),
            'expected_eval'=>$request->get('expected_date_end')
        ]);
        $unit->save();
        return redirect('/programs');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($program_id, $id)
    {
       
        $usuario = Auth::user();
        $program =Program::find($program_id);
        $unidad = Unit::find($id);
        return view('units.show',compact('program','unidad','usuario'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($program_id, $id)
    {
        
        $program =Program::find($program_id);
        $unidad = Unit::find($id);
        return view('units.edit',compact('program','unidad'));

        
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
