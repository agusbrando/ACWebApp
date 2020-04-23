<?php

namespace App\Http\Controllers;

use App\Models\Tracking;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
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
    
}
