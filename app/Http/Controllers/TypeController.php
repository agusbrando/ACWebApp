<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Type;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;


class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::paginate(10);
        return view('types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::select('model')->distinct()->get();
        return view('types.create', compact('types'));
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
            'name' => 'required',
            'model' => 'required'
        ]);

        $type = new Type([
            'name' => $request->get('name'),
            'model' => $request->get('model')   
        ]);
        $type->save();
        return redirect('types')->with('success', 'Type saved!');
    }

    /**
     * Display the specified resource.  
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = Type::find($id);        

        return view('types.show', compact('type'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = Type::find($id);
        $types = Type::select('model')->distinct()->get();
        return view('types.edit', compact('type', 'types'));
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
            'name' => 'required',
            'model' => 'required'
        ]);
        $type = Type::find($id);
        $type->name = $request->get('name');
        $type->model = $request->get('model');


        $type->save();
        return redirect('/types')->with('Succes', 'Tipo editado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Type::find($id);
        $type->delete();

        return redirect('types')->with('success', 'Type deleted!');
    }
}
