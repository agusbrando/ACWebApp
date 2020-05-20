<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\SessionTimetable;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\Timetable;
use App\Models\YearUnion;

class TimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     *



     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

    public function horario($id)
    {
        $timetable = Timetable::find($id);
        
        $sessions=array();
        $session_timetables=SessionTimetable::all();
        foreach($session_timetables as $session_timetable){
            if($session_timetable->timetable_id == $id){
                $session=Session::find($session_timetable->session_id);
                $year_union=YearUnion::find($session_timetable->year_union_id);
                $subject = Subject::find($year_union->subject_id);
                
                    $session->subject=$subject;

                    switch($subject->abbreviation){
                        case 'EIE':
                        case 'FOL':
                            $session->subject->color='#ffaaff';
                        break;  
                        case 'BD':
                            $session->subject->color='#aaffff';
                        break;  
                        case 'SI':
                            $session->subject->color='#ffffaa';
                        break;  
                        case 'ING':
                            $session->subject->color='#aaaaff';
                        break; 
                        case 'PRO':
                            $session->subject->color='#aaffaa';
                        break; 
                        case 'LM':
                            $session->subject->color='#55ffaa';
                        break; 
                        case 'EDE':
                            $session->subject->color='#8fffff';
                        break; 
                        case 'PSP':
                            $session->subject->color='#ffdd77';
                        break; 
                        case 'PMM':
                            $session->subject->color='#ffaaaa';  
                        break; 
                        case 'SGE':
                            $session->subject->color='#aaff77';
                        break; 
                        case 'AD':
                            $session->subject->color='#aa77ff';
                        break; 
                        case 'DI':
                            $session->subject->color='#77aaff';
                        break;
                    }






                    array_push($sessions,$session);
                
                
            }
        }
        
        return view('Timetable.horario', compact('timetable','sessions')); 
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

        return redirect('/horarios')->with('exito', 'Horario borrado!');
    }
}

   
