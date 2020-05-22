<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Session;
use App\Models\Type;
use App\Models\Classroom;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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

    public function index()
    {
        $sessions = Session::paginate(10);// ->load('type','classroom')
        $days = ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'];
        return view('sessions.index', compact('sessions','days'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        date_default_timezone_set('Europe/Madrid');

        $sessions = Session::all();
        $days = ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'];
        $classrooms = Classroom::all();
        $types = Type::all()->where('model', Event::class);;

        return view('sessions.create', compact('sessions', 'days', 'types', 'classrooms'));
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
            'classroom' => 'required',
            'type' => 'required',
            'day' => 'required',
            'time_start' => 'required',
            'time_end' => 'required'


        ]);

        $session = new Session([
            'classroom' => $request->get('classroom'),
            'type' => $request->get('type'),
            'day' => $request->get('day'),
            'time_start' => $request->get('time_start'),
            'time_end' => $request->get('time_end')

        ]);
        $session->save();
        return redirect('sessions')->with('success', 'Contact saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $session = Session::find($id);
        $days = ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'];

        return view('sessions.show', compact('session','days'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        date_default_timezone_set('Europe/Madrid');
        $session = Session::find($id);
        $sessions = Session::all();
        $days = ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'];
        $classrooms = Classroom::all();
        $types = Type::all()->where('model', Event::class);

        return view('sessions.edit', compact('session','sessions', 'days', 'types', 'classrooms'));
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
            'classroom' => 'required',
            'type' => 'required',
            'day' => 'required',
            'time_start' => 'required',
            'time_end' => 'required'
        ]);
        $session = Session::find($id);
        $session->classroom_id = $request->get('classroom');
        $session->type_id = $request->get('type');
        $session->time_start = $request->get('time_start');
        $session->time_end = $request->get('time_end');


        $session->save();
        return redirect('/sessions' )->with('Succes', 'Sesión editada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $session = Session::find($id);
        $session->delete();

        return redirect('sessions')->with('success', 'Sesión Eliminado!');
    }
}
