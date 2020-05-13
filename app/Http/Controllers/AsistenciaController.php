<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    public function index(){
        $users = User::all();
        return view('asistencia.index', compact('users'));
    }

    //FILTROS
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
    }
}
