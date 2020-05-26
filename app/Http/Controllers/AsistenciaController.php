<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Misbehavior;
use App\Models\User;
use App\Models\YearUnion;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
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

    public function index()
    {
        $filtradoCurso = false;
        $users = User::all();
        $courses = Course::all();

        // foreach ($users as $key => $user) {
        //     if (in_array($user->id, $users->pluck('id')->toArray())) {
        //         $assignPermissions[$permission->id][$role->id] = true;
        //     }
        // }

        return view('asistencia.index', compact('users', 'courses', 'filtradoCurso'));
    }

    public function filter(Request $request)
    {
        //Definimos que obtendrá objetos de la tabla items
        $query = DB::table('misbehaviors');

        //cogemos los valores de los selects
        // $idData = $request->get('data');
        // $idHorario = $request->get('horario');
        $idCurso = $request->get('curso');
        $idAsignatura = $request->get('asignatura');

        //Controlamos que si no llega null haga una consulta obteniendo los item
        //que tenga dicho id de los diferentes filtros.
        //Los resultados de cada consulta se va concatenando en $query
        // if($idData != ""){
        //     $query = $query->where('date', $idData);
        // }
        // if($idHorario != ""){
        //     $query = $query->where('state_id', $idState);
        // }
        if($idCurso != ""){
            $query = $query->where('type_id', $idCurso);
        }
        if($idAsignatura != ""){
            $query = $query->where('type_id', $idAsignatura);
        }
        //Finalmente obtenemos todos los items que han pasado los filtros
        $items = $query->get();


        //Filtro para coger solo los typos del modelo Item
        $types = Type::all()->where('model', Item::class);
        $classrooms = Classroom::all();
        $states = State::all();

        return view('items.index', compact('classrooms', 'items', 'types', 'states'));
        $request->validate([

            'grupo' => 'required',
            'date' => 'required'

        ]);

        $fecha = $request->get('date');

        $yearUnion = YearUnion::where('year_id', 1)->where('course_id', $request->get('grupo'))->first();
        $users = $yearUnion->users;
        $courses = Course::all();
        $filtradoCurso = true;
        $subjects = Course::find($request->get('grupo'))->subjects;
        return view('asistencia.index', compact('users', 'courses', 'fecha', 'filtradoCurso', 'subjects'));
    }

    public function store(Request $request, $user_id)
    {
        $request->validate([
            'date' => 'required',
            'type_id' => 'required',
            'description' => 'required',
            'year_user_id' => 'required',
            'session_timetable_id' => 'required'

        ]);

        $misbehavior = new Misbehavior([
            'date' => $request->get('date'),
            'type_id' => $request->get('type_id'),
            'description' => $request->get('description'),
            'year_user_id' => 1,
            'session_timetable_id' => 1
        ]);
        $misbehavior->save();
        // return redirect()->route('faltas.index')
        //     ->with('success', 'Falta añadida!');
        return redirect('/faltas/' . $user_id);
    }
}
