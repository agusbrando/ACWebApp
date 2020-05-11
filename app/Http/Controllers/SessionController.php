<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;


class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions = Session::all();
        return view('sessions.index', compact('sessions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sessions = Session::all();
        return view('sessions.create', compact('sessions'));
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
            'classroom_id' => 'required',
            'type_id' => 'required',
            'day' => 'required',
            'time_start' => 'required',
            'time_end' => 'required'


        ]);

        $session = new Session([
            'classroom_id' => $request->get('classroom_id'),
            'type_id' => $request->get('type_id'),
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

        return view('sessions.show', compact('session'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $session = Session::find($id);       
        return view('sessions.edit', compact('session'));
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
            'classroom_id' => 'required',
            'type_id' => 'required',
            'day' => 'required',
            'time_start' => 'required',
            'time_end' => 'required'
        ]);
        $session = Session::find($id);
        $session->classroom_id = $request->get('classroom_id');
        $session->type_id = $request->get('type_id');
        $session->email = $request->get('email');
        $session->time_start = $request->get('time_start');
        $session->time_end = $request->get('time_end');


        $session->save();
        return redirect('/sessions' . $id)->with('Succes', 'Sesión editada!');
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
