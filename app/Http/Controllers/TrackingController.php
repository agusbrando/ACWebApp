<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Tracking;
use Dotenv\Store\File\Paths;
use Illuminate\Http\Request;

class TrackingController extends Controller
{

  
  public function index()
  {
    $trackings=Tracking::all();
        return view('Tracking.index',compact('trackings'));
    
  }

  
  
  public function store(Request $request)
    {
      
        $request->validate([
          'time_end'=> 'required',
          'time_start' => 'required',
          'time_end2'=> 'required',
          'time_start2' => 'required',
          'date_start' =>'required',
          'firma'=>'required'
        ]);
        
      
	  
        $image_parts = explode(";base64,", $request->get('firma'));
            
        $image_type_aux = explode("image/", $image_parts[0]);
          
        $image_type = $image_type_aux[1];
          
        $image_base64 = base64_decode($image_parts[1]);
          
        $file = "upload\'".uniqid() . '.'.$image_type;
        //$file->move(storage_path("app/tracking/$tracking->id"));
      
        file_put_contents($file, $image_base64);
        
           
        
          
        list($hora_ini_1,$hora_ini_2) = explode(":",$request->get('time_start'));
        list($hora_fin_1,$hora_fin_2) = explode(":",$request->get('time_end'));
        list($hora_ini_3,$hora_ini_4) = explode(":",$request->get('time_start2'));
        list($hora_fin_3,$hora_fin_4) = explode(":",$request->get('time_end2'));
        $suma=(($hora_fin_1-$hora_ini_1)*60)+($hora_fin_2-$hora_ini_2)+((($hora_fin_3-$hora_ini_3)*60)+($hora_fin_4-$hora_ini_4));
        
        $user = Auth::user();
        $num_hours=$suma/60;
        $tracking = new Tracking([
            'signature'=>$file,
            'user_id' => $user->id,
            'datetime_start' =>$request->get('date_start'),
            'datetime_end' =>$request->get('date_start'),
            'num_hours'=>$num_hours,
            
        ]);
        $tracking->save();
        return redirect('/seguimiento')->with('exito', 'Horario creado!');
    }
    
}
