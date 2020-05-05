<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Tracking;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;


class TrackingController extends Controller
{


  public function index()
  {
    $user = Auth::user();
    $horas=0;
    $trackings = Tracking::all();
    foreach ($trackings as $tracking) {
      if($tracking->user_id==$user->id){
        $horas += $tracking->num_hours;
      }
    }
    
    
      
    return view('Tracking.index', compact('trackings', 'user','horas'));
  }



  public function store(Request $request)
  {

    $request->validate([
      'time_end' => 'required',
      'time_start' => 'required',

      'date_start' => 'required',


    ]);


    $user = Auth::user();




    list($hora_ini_1, $hora_ini_2) = explode(":", $request->get('time_start'));
    list($hora_fin_1, $hora_fin_2) = explode(":", $request->get('time_end'));

    $suma = (($hora_fin_1 - $hora_ini_1) * 60) + ($hora_fin_2 - $hora_ini_2);

    if ($request->get('time_end') < $request->get('time_end2')) {
      $hora_fin = $request->get('time_end2');
    } else {
      $hora_fin = $request->get('time_end');
    }

    $num_hours = $suma / 60;
    $tracking = new Tracking([
      'signature' => $user->signature,
      'user_id' => $user->id,
      'date_signature' => $request->get('date_start'),
      'time_start' => $request->get('time_start'),
      'time_end' => $hora_fin,
      'num_hours' => $num_hours,

    ]);


    $tracking->save();
    return redirect('/seguimiento')->with('exito', 'Horario creado!');
  }






  public function edit($id)
  {

    $user = Auth::user();
    return view('Tracking.edit', compact('user'));
  }


  public function update(Request $request, $id)
  {
    $request->validate([
      'firma' => 'required',

    ]);

    $user = Auth::user();

    $image_parts = explode(";base64,", $request->get('firma'));

    $image_type_aux = explode("image/", $image_parts[0]);

    $image_type = $image_type_aux[1];
    $uniq = uniqid();
    $image_base64 = base64_decode($image_parts[1]);
    $ruta = "signatures/" . $user->id;
    $micarpeta = "../storage" . $ruta;
    if (!file_exists($micarpeta)) {
      //mkdir($micarpeta, 777, true);
      Storage::disk("public")->put("/" . $ruta . "/" . $uniq . '.' . $image_type, $image_base64);
    }
    //$file = $micarpeta . "\\" . uniqid() . '.' . $image_type;
    //file_put_contents($file, $image_base64);


    //"app/" . $ruta . "/" .
    $user->signature = Storage::url("/" . $ruta . "/" . $uniq . '.' . $image_type);

    $user->save();

    return redirect('/seguimiento')->with('exito', 'Horario editado!');
  }
  public function fileStorageServe($file)
  {

    if (!Storage::disk('local')->exists($file)) {
      abort('404');
    }
    //$file=DIRECTORY_SEPARATOR.($file);
    //return view('Tracking.index', compact('file')); 
    return response()->file(DIRECTORY_SEPARATOR . ($file));
  }
  public function filtrar(Request $request)
  {
    $user = Auth::user();
    $dia = $request->get('fecha');
    $semana = $request->get('semana');
    $mes = explode("-",$request->get('mes'));
    $anyo = $request->get('anyo');
    $trackings = array();
    $horas = 0;
    $trackingstodos = Tracking::all();
    $trackingsuser=array();
    foreach ($trackingstodos as $tracking) {
      if($tracking->user_id==$user->id){
          array_push($trackingsuser, $tracking);
      }
    }
    
    if ($dia != null) {
      foreach ($trackingsuser as $tracking) {
        if ($tracking->date_signature == $dia) {
          array_push($trackings, $tracking);
          $horas += $tracking->num_hours;
        }
      }
    }else if($semana != null){
      
    }else if($mes != null){
      foreach ($trackingsuser as $tracking) {
        $fechapartes=explode("-",$tracking->date_signature);
        if ($fechapartes[0] == $mes[0]) {
            switch($mes[0]){
              case 1:
                if((int)$fechapartes[1]==1){
                  array_push($trackings, $tracking);
                }
                
              break;
              case 2:
                if((int)$fechapartes[1]==2){
                  array_push($trackings, $tracking);
                }
              break;
              case 3:
                if((int)$fechapartes[1]==3){
                  array_push($trackings, $tracking);
                }
              break;
              case 4:
                if((int)$fechapartes[1]==4){
                  array_push($trackings, $tracking);
                }
              break;
              case 5:
                if((int)$fechapartes[1]==5){
                  array_push($trackings, $tracking);
                }
              break;
              case 6:
                if((int)$fechapartes[1]==6){
                  array_push($trackings, $tracking);
                }
              break;
              case 7:
                if((int)$fechapartes[1]==7){
                  array_push($trackings, $tracking);
                }
              break;
              case 8:
                if((int)$fechapartes[1]==8){
                  array_push($trackings, $tracking);
                }
              break;
              case 9:
                if((int)$fechapartes[1]==9){
                  array_push($trackings, $tracking);
                }
              break;
              case 10:
                if((int)$fechapartes[1]==10){
                  array_push($trackings, $tracking);
                }
              break;
              case 11:
                if((int)$fechapartes[1]==11){
                  array_push($trackings, $tracking);
                }
              break;
              case 12:
                if((int)$fechapartes[1]==12){
                  array_push($trackings, $tracking);
                }
              break;
            }
          array_push($trackings, $tracking);
          $horas += $tracking->num_hours;
        }
      }
    }else if($anyo != null){
      foreach ($trackingsuser as $tracking) {
        $fechapartes=explode("-",$tracking->date_signature);
        if ($fechapartes[0] == $anyo) {
          array_push($trackings, $tracking);
          $horas +=$tracking->num_hours;
        }
      }
    }


    return view('Tracking.index', compact('trackings', 'horas','user'));
  }
}
