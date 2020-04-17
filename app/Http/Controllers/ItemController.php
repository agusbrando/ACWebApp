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
    public function index()
    {
        //Cojo todas las aulas que exiten para mostrarlas en el desplegable
        // para elegir a que aula pertenece el Item
        $classrooms = Classroom::all();

        //Filtro para coger solo los typos del modelo Item
        $types = DB::table('types')->where('model','Item')->get();
        $items = Item::all();
        return view('items.index', compact('classrooms', 'items', 'types'));
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
        $types = DB::table('types')->where('model','Item')->get();
        $items = Item::all();
        return view('items.create', compact('classrooms', 'items', 'types'));
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
            'name'=>'required',
            'date_pucharse'=>'required',
            'classroom_id'=>'required',
            'type_id'=>'required',
        ]);

        $item = new Item([
            'name' => $request->get('name'),
            'date_pucharse'=>$request->get('fechaCompra'),
            'classroom_id'=>'required',
            'state_id'=>'Nuevo',
            'type_id'=>'required',

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
        //
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
        //
    }
}
