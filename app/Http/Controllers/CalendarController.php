<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\User;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


use function PHPSTORM_META\type;

class CalendarController extends Controller
{

    public function __construct(Request $request)
    {
        $user = Auth::user();
        if($user != null){
            $notifications = $user->unreadNotifications;
            $countNotifications = $user->unreadNotifications->count();
        }else{
            $notifications = [];
            $countNotifications = 0;
        }

        $request->session()->put('notifications', $notifications);
        $request->session()->put('countNotifications', $countNotifications);

    }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function crearEvento($fecha, $hora, $type)
  {
    $tipo = Type::find($type)->name;
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

    $events = Event::all()->where('type_id', $tipo->id)->where('date', $dia);
    $event_ids = $events->pluck('session_id');
    $sessions = $tipo->sessions()->whereNotIn('id', $event_ids)->where('day', $day)->get();
    return view('/Calendario/time', compact('sessions', 'dia', 'tipo', 'events'));
  }

  public function getList(Request $request)
  {
    $user = Auth::user();
    $events = Event::all();
    //$events = Event::where('user_id', $user->id)->get();
    return view('/Calendario/list', compact('events', 'user'));
  }

  public function getTeacher(Request $request)
  {
    $teachers = User::all()->where('role_id', 3);
    return view('/Calendario/teacher', compact('teachers', 'tipo', 'dia'));
  }

  public function index()
  {
    $user = Auth::user();
    $sessions = [];
    $events = [];
    $types = Type::all()->where('model', Event::class);
    return view('/Calendario/calendar', compact('types', 'sessions', 'events', 'user'));
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
    return redirect('/list')->with('Exito', '¡Evento creado!');
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

  public function edit($id)
  {
    $event = Event::find($id);
    $titulo = $event->title;
    $descripcion = $event->description;

    return view("/Calendario/edit", compact('id', 'event', 'titulo', 'descripcion'));
  }

  public function destroy($id)
  {
    $event = Event::find($id);
    $event->delete();

    return redirect('/list')->with('Exito', '¡Evento borrado!');
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
      'titulo'  =>  'required',
      'descripcion' => 'required'

    ]);

    $event = Event::find($id);
    $event->title = $request->get('titulo');
    $event->description = $request->get('descripcion');
    $event->save();

    return redirect('/list')->with('Exito', '¡Evento editado!');
  }


  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */

}
