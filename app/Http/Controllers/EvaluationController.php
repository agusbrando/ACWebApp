<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;


class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evaluations = Evaluation::all();
        return view('evaluations.index', compact('evaluations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $evaluations = Evaluation::all();
        return view('evaluations.create', compact('evaluations'));
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
            'subject_id' => 'required',
            'name' => 'required', 
        ]);

        $evaluation = new Evaluation([
            'subject_id' => $request->get('subject_id'),
            'name' => $request->get('name'),  
        ]);

        $evaluation->save();
        return redirect('evaluations.index')->with('success', 'Evaluación saved!');
    }

    /**
     * Display the specified resource.  
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($evaluation_id)
    {
        $evaluacion = Evaluation::find($evaluation_id);
       // $user->role = $user->role;
        return view('users.show', compact('evaluacion'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evaluation = Evaluation::find($id);
        // $roles = Role::all();
        return view('users.edit', compact('evaluation'));
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

        $request->validate([
            'subject_id' => 'required',
            'name' => 'required'
           
        ]);
        $evaluation = Evaluation::find($id);
        $evaluation->subject_id = $request->get('subject_id');
        $evaluation->name = $request->get('name');
        


        $evaluation->save();
        return redirect('/evaluations' . $id)->with('Succes', 'Evaluación editado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Evaluation::find($id);
        $user->delete();

        return redirect('/evaluations')->with('Success', 'Evaluación deleted!');
    }
}
