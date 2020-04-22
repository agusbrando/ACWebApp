<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Classroom;
use App\Models\Type;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id=null)
    {
        if($id == null){
            $items = Item::all();
        }else{
            $types = Type::all()->where('model', Item::class);
        }
        //Cojo todas las aulas que exiten para mostrarlas en el desplegable
        // para elegir a que aula pertenece el Item

        $classrooms = Classroom::all();

        //Filtro para coger solo los typos del modelo Item
        // $types = Type::all()->where('model','Item');
        $items = Item::all();
        return view('items.index', compact('classrooms', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classrooms = Classroom::all();
        //Filtro para coger solo los typos del modelo Item
        $types = Type::all()->where('model','Item');
        
        return view('items.create', compact('classrooms', 'types'));
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
            'date_pucharse'=>'required',
            'classroom_id'=>'required',
            'type_id'=>'required',
        ]);

        $item = new Item([
            'name' => $request->get('name'),
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
        $items = DB::table('items')->where('classroom_id', $id)->get();
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
