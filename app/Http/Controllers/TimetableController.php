<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timetable;

class TimetableController extends Controller
{
    
    public function index()
    {
        $timetables=Timetable::all();
        return view('Timetable.index',compact('timetables'));
    }

    public function create()
    {
        return view('Timetable.create');
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
            
        ]);
      
        $timetable = new Timetable([
            'name' => $request->get('name'),
            'date_start' => $request->get('date_start'),
            'date_end' => $request->get('date_end'),
           
        ]);
        $timetable->save();
        return redirect('/horario')->with('exito', 'Horario creado!');
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
        $timetable = Timetable::find($id);
        return view('Timetable.edit', compact('timetable'));        
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
        

        $timetable = Timetable::find($id);
        $timetable->name =  $request->get('name');
        $timetable->date_start= $request->get('date_start');
        $timetable->date_end= $request->get('date_end');
        $timetable->save();

        return redirect('/horario')->with('exito', 'Horario editado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $timetable = Timetable::find($id);
        $timetable->delete();

        return redirect('/horario')->with('exito', 'Horario borrado!');
    }
}

   