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
    $user = Auth::user();
    $trackings=Tracking::all();
    
        return view('Tracking.index',compact('trackings','user'));
    
  }

  
  
  public function store(Request $request)
    {
      
        $request->validate([
          'time_end'=> 'required',
          'time_start' => 'required',
          
          'date_start' =>'required',
          'firma'=>'required',
          
        ]);
        
        
        $user = Auth::user();

      
      $file=$user->signature;
      
      if($request->get('firma')!=null){
        $image_parts = explode(";base64,", $request->get('firma'));
            
        $image_type_aux = explode("image/", $image_parts[0]);
          
        $image_type = $image_type_aux[1];
          
        $image_base64 = base64_decode($image_parts[1]);
        $micarpeta = "..\storage\app\signatures\'".$user->id;
        if (!file_exists($micarpeta)) {
          mkdir($micarpeta, 0777, true);
        }
        $file = $micarpeta."\'".uniqid(). '.'.$image_type;
        file_put_contents($file, $image_base64);
      }
      
        
      
        
        
           
        
          
        list($hora_ini_1,$hora_ini_2) = explode(":",$request->get('time_start'));
        list($hora_fin_1,$hora_fin_2) = explode(":",$request->get('time_end'));
        
        $suma=(($hora_fin_1-$hora_ini_1)*60)+($hora_fin_2-$hora_ini_2);
        
        if($request->get('time_end')<$request->get('time_end2')){
            $hora_fin=$request->get('time_end2');
        }else{
          $hora_fin=$request->get('time_end');
        }
        
        $num_hours=$suma/60;
        $tracking = new Tracking([
            'signature'=>$file,
            'user_id' => $user->id,
            'date_signature'=>$request->get('date_start'),
            'time_start' =>$request->get('time_start'),
            'time_end' =>$hora_fin,
            'num_hours'=>$num_hours,
            
        ]);
        $tracking->save();
        return redirect('/seguimiento')->with('exito', 'Horario creado!');
    }
    
}
