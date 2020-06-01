<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Evaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;


class EvaluationController extends Controller
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
     * Muestra todas las evaluaciones de la base de datos.
     *
     * @return view evaluations.index
     */
    public function index()
    {
        //Recojo todas las evaluaciones de la base de datos.
        $evaluations = Evaluation::paginate(10);
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
            'name' => 'required'
        ]);

        $evaluation = new Evaluation([

            'name' => $request->get('name'),
        ]);

        $evaluation->save();
        return redirect('evaluations')->with('success', 'Evaluación saved!');
    }

    /**
     * Muestra los datos de una evaluacion.
     *
     * @param  int  $evaluation_id
     * @return view evaluations.show
     */
    public function show($evaluation_id)
    {
        //Recoge todas la evaluaciones de la base de datos mediante el parametro que se pasa.
        $evaluation = Evaluation::find($evaluation_id);
        return view('evaluations.show', compact('evaluation'));
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
        return view('evaluations.edit', compact('evaluation'));
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

            'name' => 'required'

        ]);
        $evaluation = Evaluation::find($id);

        $evaluation->name = $request->get('name');



        $evaluation->save();
        return redirect('/evaluations')->with('Succes', 'Evaluación editado!');
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
