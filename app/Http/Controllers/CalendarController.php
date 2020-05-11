<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\User;
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

  public function crearEvento($fecha, $hora, $type)
  {

    if ($type == 1) {
      $tipo = 'Tutorias';
    } else {
      $tipo = 'Reserva de aulas';
    }

    return view("/Calendario/crearEvento", compact('fecha', 'hora', 'tipo'));
  }



  public function getTime(Request $request)
  {

    $sessions = [];
    $events = [];

    $this->validate($request, [
      'date' =>  'required',
      'tipo' => 'required'
    ]);

    $tipo = Type::where('name', $request->get('tipo'))->first();

    $dia = date($request->get('date'));
    $day = date('w', strtotime($dia));

    $sessions = $tipo->sessions()->where('day', $day)->get();
    $types = Type::all();$types = Type::all()->where('model', Event::class);

    if ($request->get('tipo') == 'Tutorias') {
      $events = Event::all()->where('type_id', 1);
    } else {
      $events = Event::all()->where('type_id', 2);
    }

    return view('/Calendario/calendar', compact('types', 'sessions', 'dia', 'tipo', 'events'));
  }

  public function index()
  {
    $sessions = [];
    $events = [];
    $types = Type::all();$types = Type::all()->where('model', Event::class);
    return view('/Calendario/calendar', compact('types', 'sessions', 'events'));
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

    $fechaStr = $request->get('fecha');
    $horaStr = $request->get('hora');
    $tipoId = Type::where('name', $request->get('evento'))->first()->id;
    $fechaFormateada = Carbon::createFromFormat('Y-m-d H:i', $fechaStr . ' ' . $horaStr);


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
    return redirect('/events')->with('Exito', '¡Evento borrado!');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $event = Event::find($id);
    $edit = false;
    if (URL::current() == url("/events/edit/" . $id)) {
      $edit = true;
    }
    return view('calendario.show', compact('event', 'edit'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $event = Event::find($id);
    $titulo = $event->title;
    $descripcion = $event->description;

    return view("/Calendario/edit", compact('id', 'event', 'titulo', 'descripcion'));
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
    $event = Event::find($id);

    $request->validate([
      'titulo'  =>  'required',
      'descripcion' => 'required'
    ]);

    $event->title = $request->get('titulo');
    $event->description = $request->get('descripcion');
    $event->save();

    return redirect('/events')->with('Exito', '¡Evento editado!');
  }


  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $event = Event::find($id);
    $event->delete();

    return redirect('/events')->with('Exito', '¡Evento borrado!');
  }
}
