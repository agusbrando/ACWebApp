<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD

class TimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
=======
use App\Models\Timetable;

class TimetableController extends Controller
{
    
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
>>>>>>> feat_controladores_carloscu
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        //
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
=======
        $timetables=Timetable::all();
        return view('Timetable.index',compact('timetables'));
    }

    public function create()
    {
        return view('Timetable.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'date_start'=>'required',
            'date_end'=>'required'
        ]);
      
        $timetable = new Timetable([
            'name' => $request->get('name'),
            'date_start' => $request->get('date_start'),
            'date_end' => $request->get('date_end'),
           
        ]);
        $timetable->save();
        return redirect('/horarios')->with('exito', 'Horario creado!');
>>>>>>> feat_controladores_carloscu
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
<<<<<<< HEAD

=======
    public function horario($id)
    {
        $timetable = Timetable::find($id);
        return view('Timetable.horario', compact('timetable')); 
    }
>>>>>>> feat_controladores_carloscu
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
<<<<<<< HEAD
        //
=======
        $timetable = Timetable::find($id);
        return view('Timetable.edit', compact('timetable'));        
>>>>>>> feat_controladores_carloscu
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
<<<<<<< HEAD
        //
=======
        $request->validate([
            'name'=>'required',
            'date_start'=>'required',
            'date_end'=>'required'
        ]);

        $timetable = Timetable::find($id);
        $timetable->name = $request->get('name');
        $timetable->date_start= $request->get('date_start');
        $timetable->date_end= $request->get('date_end');
        $timetable->save();

        return redirect('/horarios')->with('exito', 'Horario editado!');
>>>>>>> feat_controladores_carloscu
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
<<<<<<< HEAD
        //
    }
}
=======
        $timetable = Timetable::find($id);
        $timetable->delete();

        return redirect('/horarios')->with('exito', 'Horario borrado!');
    }
}

   
>>>>>>> feat_controladores_carloscu
