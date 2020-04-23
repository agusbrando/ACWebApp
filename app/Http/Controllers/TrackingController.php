<?php

namespace App\Http\Controllers;
<<<<<<< HEAD

=======
use App\Models\Tracking;
>>>>>>> feat_controladores_carloscu
use Illuminate\Http\Request;

class TrackingController extends Controller
{
<<<<<<< HEAD
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
=======
  public function index()
  {
    return view('Tracking.index');
  }

  public function upload(Request $request)
  {
    $folderPath = public_path('upload/');
  
    $image_parts = explode(";base64,", $request->signed);
        
    $image_type_aux = explode("image/", $image_parts[0]);
      
    $image_type = $image_type_aux[1];
      
    $image_base64 = base64_decode($image_parts[1]);
      
    $file = $folderPath . uniqid() . '.'.$image_type;
    file_put_contents($file, $image_base64);
    return back()->with('success', 'success Full upload signature');
  }
  public function store(Request $request)
    {
        $request->validate([
          'time_end'=> 'required',
          'time_start' => 'required',
          'date_start' =>'required',
          
          
            
        ]);

        
        $num_hours=$request->get('time_end')-$request->get('time_start');
        $tracking = new Tracking([
            'signature'=> 'firma',
            'user_id' => '1',
            'datetime_start' =>$request->get('date_start'),
            'datetime_end' =>$request->get('date_start'),
            'num_hours'=>$num_hours,
            
        ]);
        $tracking->save();
        return redirect('/seguimiento')->with('exito', 'Horario creado!');
    }
    
>>>>>>> feat_controladores_carloscu
}
