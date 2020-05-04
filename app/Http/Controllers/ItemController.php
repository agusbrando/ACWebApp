<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
        $items = Item::all();
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // muestra los datos obtenidos del formulario en pantallak
        // dd(request()->all()); 

        $request->validate([
            'name'=>'required',
            'number'=>'required',
            'date_pucharse'=>'required',
            'classroom_id'=>'required',
            'type_id'=>'required',
        ]);

        $item = new Item([
            'name' => $request->get('name'),
            'number' => $request->get('number'),
            'date_pucharse'=>$request->get('date_pucharse'),
            'classroom_id'=>$request->get('classroom_id'),
            'state_id'=>'1',
            'type_id'=>$request->get('type_id'),
            

        ]);
        $item->save();
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
        $courses = Course::all();

        return view('items.show', compact('item', 'type', 'users', 'courses'));
    }

    /**
     * Show the form for editing the specified resource.
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
        
        $item->date_pucharse = Carbon::parse($item->date_pucharse)->format('Y-m-d');

        return view('items.edit', compact('item', 'classrooms', 'types', 'states'));
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
        $all = $request->all();

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
        return redirect('/items')->with('exito', 'Item editado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Item::find($id)->delete();

        return redirect('/items')->with('exito', 'Item eliminado!');
    }
}
