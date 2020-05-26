<?php

namespace App\Http\Controllers;
use App\Models\SessionTimetable;
use App\Models\Session;
use App\Models\Subject;
use App\Models\YearUnion;
use App\Models\Timetable;
use Illuminate\Http\Request;

class SessionTimetableController extends Controller
{
    public function crear($id)
    {
        $timetable=Timetable::find($id);
        $session_timetables=SessionTimetable::all();
        $sessions=Session::all();
        $horas_validas=array();
            $session_timetables_buenas = $session_timetables->where('timetable_id', $id);
            $subjects=Subject::all();
            $sessions_buenas=$sessions->where('type_id', 3);
            foreach($sessions_buenas as $session){
                   switch($session->day){
                        case 1:
                            $session->dia='Lunes';
                        break;
                        case 2:
                            $session->dia='Martes';
                        break;
                        case 3:
                            $session->dia='Miércoles';
                        break;
                        case 4:
                            $session->dia='Jueves';
                        break;
                        case 5:
                            $session->dia='Viernes';
                        break;
                   }
                    array_push($horas_validas,$session);
                
            }

        
       
        return view('SessionTimetable.create',compact('timetable','horas_validas','subjects'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'timetable'=>'required',
            'sesion'=>'required',
            'asignatura'=>'required',
            
        ]);
        $year_unions=YearUnion::all();
        $correctos=$year_unions->where('subject_id',$request->get('asignatura'));
        $year_union=null;
        foreach($correctos as $correcto){
            $year_union=$correcto;
            break;
        }
        list($timetable_id,$timetable_name)=explode('-',$request->get('timetable'));
        
        $session_timetable = new SessionTimetable([
            'timetable_id'=>$timetable_id,
            'session_id' => $request->get('sesion'),
            'year_union_id' => $year_union->id,
            
           
        ]);
        $session_timetable->save();
        return redirect('/horarios')->with('exito', 'Horario creado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($session_id,$timetable_id)
    {
        $session_timetables=SessionTimetable::all();
        $session_timetable_busqueda=$session_timetables->where('timetable_id',$timetable_id)->where('session_id',$session_id);
        foreach($session_timetable_busqueda as $s){
            $session_timetable=$s;
        break;
        }
        $year_union=YearUnion::find($session_timetable->year_union_id);
        $subject=Subject::find($year_union->subject_id);
        $timetable=Timetable::find($session_timetable->timetable_id);
        $hora_valida=Session::find($session_timetable->session_id);
        $session_timetables=SessionTimetable::all();
        $sessions=Session::all();
        $horas_validas=array();
            $session_timetables_buenas = $session_timetables->where('timetable_id', $timetable_id);
            $subjects=Subject::all();
            $sessions_buenas=$sessions->where('type_id', 3);
            foreach($sessions_buenas as $session){
                   switch($session->day){
                        case 1:
                            $session->dia='Lunes';
                        break;
                        case 2:
                            $session->dia='Martes';
                        break;
                        case 3:
                            $session->dia='Miércoles';
                        break;
                        case 4:
                            $session->dia='Jueves';
                        break;
                        case 5:
                            $session->dia='Viernes';
                        break;
                   }
                    array_push($horas_validas,$session);
                
            }
           
                switch($hora_valida->day){
                     case 1:
                         $hora_valida->dia='Lunes';
                     break;
                     case 2:
                         $hora_valida->dia='Martes';
                     break;
                     case 3:
                         $hora_valida->dia='Miércoles';
                     break;
                     case 4:
                         $hora_valida->dia='Jueves';
                     break;
                     case 5:
                         $hora_valida->dia='Viernes';
                     break;
                }
        return view('SessionTimetable.show',compact('session_timetable','timetable','horas_validas','subjects','subject','hora_valida'));
    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $session_timetable=SessionTimetable::find($id);
        
                 
             
         
        return view('SessionTimetable.edit',compact('session_timetable'));
               
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
        $year_unions=YearUnion::all();
        $correctos=$year_unions->where('subject_id',$request->get('asignatura'));
        $year_union=null;
        foreach($correctos as $correcto){
            $year_union=$correcto;
            break;
        }
        
        
        $session_timetable = SessionTimetable::find($id);
        $session_timetable->year_union_id=$year_union->id;
        $session_timetable->session_id=$request->get('sesion');
        $session_timetable->save();
        return redirect('/horarios')->with('exito', 'Horaeditada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $session_timetable=SessionTimetable::find($id);
        $session_timetable->delete();

        return redirect('/horarios')->with('exito', 'Hora borrada!');
    }
}

