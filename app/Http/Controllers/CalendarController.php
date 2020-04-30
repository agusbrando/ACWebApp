<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Session;
use App\Models\Event;
use Carbon\Carbon;


use function PHPSTORM_META\type;

class CalendarController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */



  public function details($id)
  {

    $event = Event::find($id);

    return view("/Calendario/evento", [
      "event" => $event
    ]);
  }


  public function crearEvento($fecha, $hora, $type){

    if($type == 1){
      $tipo = 'Tutorias';
    }else{
      $tipo = 'Reserva de aulas';
    }

    return view("/Calendario/crearEvento", compact('fecha', 'hora', 'tipo'));
  }


  
  public function getTime(Request $request)
  {

    $sessions = [];
    $this->validate($request, [
      'date' =>  'required',
      'tipo' => 'required'
    ]);

    $tipo = Type::where('name', $request->get('tipo'))->first();  

    $dia = date($request->get('date'));
    $day = date('w', strtotime($dia));

    $sessions = $tipo->sessions()->where('day', $day)->get();
    $types = Type::all();
    return view('/Calendario/calendar', compact('types', 'sessions', 'dia', 'tipo'));
  }

  public function index()
  {
    $sessions = [];
    $types = Type::all();
    return view('/Calendario/calendar', compact('types', 'sessions'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Request $request)
  {
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //validacion
    $this->validate($request, [
      'evento' => 'required',
      'titulo'  =>  'required',
      'descripcion' => 'required',
      'hora'  =>  'required',
      'fecha' => 'required'
      
    ]);

    
    $tipoId = Type::where('name', $request->get('evento'))->first()->id;      
    $fechaFormateada = Carbon::createFromFormat('YY-mm-dd', 'fecha');
    

    //guardar en la base de datos
    Event::insert([
      'type_id' => $tipoId,
      'session_id' => 1,
      'user_id' => 1,
      'title' => $request->get('titulo'),
      'description'  => $request->get('descripcion'),
      'date' =>  $fechaFormateada
    ]);

    //devuelve el mensaje con exito
    return back()->with('success', 'Guardado exitosamente!');
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
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $event = event::find($id);
    $event->delete();

    return redirect('/calendar')->with('Exito', 'Evento borrado!');
  }
}
