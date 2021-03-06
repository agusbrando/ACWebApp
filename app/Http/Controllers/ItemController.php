<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Classroom;
use App\Models\Course;
use App\Models\Type;
use App\Models\State;
use App\Models\Item;
use App\Models\User;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //Cojo todas las aulas que exiten para mostrarlas en el desplegable
        // para elegir a que aula pertenece el Item

        $types = Type::all()->where('model', Item::class);
        $classrooms = Classroom::all();    //->load('name', Classroom::class)
        $states = State::all();
        $items = Item::paginate(10);

        return view('items.index', compact('classrooms', 'items', 'types', 'states'));
    }
    public function filter(Request $request)
    {
        //Definimos que obtendrá objetos de la tabla items
        $query = DB::table('items');

        //cogemos los valores de los selects
        $idClass = $request->get('idClass');
        $idState = $request->get('idState');
        $idType = $request->get('idType');

        //Controlamos que si no llega null haga una consulta obteniendo los item
        //que tenga dicho id de los diferentes filtros.
        //Los resultados de cada consulta se va concatenando en $query
        if($idClass != ""){
            $query = $query->where('classroom_id', $idClass);
        }
        if($idState != ""){
            $query = $query->where('state_id', $idState);
        }
        if($idType != ""){
            $query = $query->where('type_id', $idType);
        }
        //Finalmente obtenemos todos los items que han pasado los filtros
        $items = $query->get();


        //Filtro para coger solo los typos del modelo Item
        $types = Type::all()->where('model', Item::class);
        $classrooms = Classroom::all();
        $states = State::all();

        return view('items.index', compact('classrooms', 'items', 'types', 'states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        $classrooms = Classroom::all();
        //Filtro para coger solo los typos del modelo Item
        $types = Type::all()->where('model',Item::class);

        return view('items.create', compact('classrooms', 'types', 'states'));
    }

    /**
     * Cuando en create le da al boton "guardar" guardamos el curso en la Base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // muestra los datos obtenidos del formulario en pantalla
        // dd(request()->all());

        //Valido que los campos que necesito no sean nulos
        $request->validate([
            'name'=>'required',
            'number'=>'required',
            'date_pucharse'=>'required',
            'classroom_id'=>'required',
            'type_id'=>'required',
        ]);
        //ahora recojo los valores de los difrentes input y selects llamandoles por su identificador
        $item = new Item([
            'name' => $request->get('name'),
            'number' => $request->get('number'),
            'date_pucharse'=>$request->get('date_pucharse'),
            'classroom_id'=>$request->get('classroom_id'),
            'state_id'=>'1',
            'type_id'=>$request->get('type_id'),


        ]);
        //y lo guardamos en la base de datos
        $item->save();

        //y le redirijo a la vista principal para que vea que se ha añadido
        return redirect('/items')->with('exito', 'Item creado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        $type = Type::find($item->type_id);
        $users = User::all();
        $item->aula = Classroom::find($item->classroom_id);
        $item->state = State::find($item->state_id);
        $item->type = Type::find($item->type_id);
        $courses = Course::all();

        return view('items.show', compact('item', 'type', 'users', 'courses'));
    }

    /**
     * Muestra el formulario para editar el item.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = Type::all()->where('model', Item::class);
        $classrooms = Classroom::all();    //->load('name', Classroom::class)
        $states = State::all();
        $item = Item::find($id);
        $itemId = $id;
        $item->date_pucharse = Carbon::parse($item->date_pucharse)->format('Y-m-d');

        return view('items.edit', compact('item', 'classrooms', 'types', 'states','itemId'));
    }

    /**
     * Actualiza los datos del item en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'number'=>'required',
            'date_pucharse'=>'required',
            'classroom_id'=>'required',
            'state_id'=>'required',
            'type_id'=>'required',
        ]);

        $item = Item::find($id);
        $item->name = $request->get('name');
        $item->number = $request->get('number');
        $item->date_pucharse = $request->get('date_pucharse');
        $item->classroom_id = $request->get('classroom_id');
        $item->state_id = $request->get('state_id');
        $item->type_id = $request->get('type_id');


        $item->save();
        return redirect('/items/'.$id)->with('exito', 'Item editado!');
    }

    /**
     * Elimina un curso en concreto.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //busco el item y lo elimino
        Item::find($id)->delete();

        return redirect('/items')->with('exito', 'Item eliminado!');
    }
}
