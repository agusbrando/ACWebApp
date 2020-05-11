<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Tracking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Barryvdh\DomPDF\PDF;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class TrackingController extends Controller
{


  public function index()
  {
    $user = Auth::user();
    $horas = 0;
    $horasbien = array();
    $trackings = $user->trackings()->paginate(3);
    //$trackings = DB::table('trackings')->paginate(5);
    //$trackings = Tracking::all();
    $suma = 0;
    foreach ($trackings as $trackingsuser) {
      if ($trackingsuser->user_id == $user->id) {
        list($hora, $min) = explode(":", $trackingsuser->num_hours);

        $suma += ($hora * 60) + $min;
      }
    }
    $num_hours = $suma / 60;
    $hora = floor($num_hours);
    $minutos = ($num_hours - $hora) * 60;

    $horas = $hora . ':' . $minutos;


    return view('Tracking.index', compact('trackings', 'user', 'horas'));
  }

  public function create()
  {

    $user = Auth::user();
    return view('Tracking.create', compact('user'));
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

    $num_hours = $suma / 60;
    $hora = floor($num_hours);
    $minutos = ($num_hours - $hora) * 60;

    $horas = $hora . ':' . $minutos;

    $tracking = new Tracking([
      'signature' => $user->signature,
      'user_id' => $user->id,
      'date_signature' => $request->get('date_start'),
      'time_start' => $request->get('time_start'),
      'time_end' => $request->get('time_end'),
      'num_hours' => $horas,

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
    $user = Auth::user();
    if ($request->get('archivo')!=null) {
      $archivo=$request->get('archivo');
      $ruta = "signatures/" . $user->id;
      $micarpeta = "../storage" . $ruta;
      if (!file_exists($micarpeta)) {
       
        Storage::disk("public")->put("/" . $ruta . "/" .$archivo, $archivo);
      }
     
      $user->signature = Storage::url("/" . $ruta . "/" . $archivo);

      $user->save();

     
    } else {
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
    }
    return redirect('/seguimiento')->with('exito', 'Horario editado!');
  }
  public function fileStorageServe($file)
  {

    if (!Storage::disk('local')->exists($file)) {
      abort('404');
    }

    return response()->file(DIRECTORY_SEPARATOR . ($file));
  }



  public function filtrar(Request $request)
  {
    $user = Auth::user();
    $dia = $request->get('fecha');
    $fecha_fin = $request->get('fecha_fin');
    $mes = explode("-", $request->get('mes'));
    $anyo = $request->get('anyo');
    $trackings = array();
    $horas = 0;

    if ($dia != null && $fecha_fin  != null) {
      $trackings = $user->trackings()->whereBetween('date_signature', [$dia, $fecha_fin])->get();
    } else if ($dia != null) {
      $trackings = $user->trackings()->whereDate('date_signature', $dia)->get();
    } else if ($anyo != null) {
      $trackings = $user->trackings()->whereYear('date_signature', $anyo)->get();
    } else if ($mes != null) {
      $trackings = $user->trackings()->whereYear('date_signature', $mes[0])->wheremonth('date_signature', $mes[1])->get();
    }
    $suma = 0;
    foreach ($trackings as $trackingsuser) {
      if ($trackingsuser->user_id == $user->id) {
        list($hora, $min) = explode(":", $trackingsuser->num_hours);
        $suma += ($hora * 60) + $min;
      }
    }
    $num_hours = $suma / 60;
    $hora = floor($num_hours);
    $minutos = ($num_hours - $hora) * 60;

    $horas = $hora . ':' . $minutos;

    return view('Tracking.index', compact('trackings', 'horas', 'user'));
  }


  public function imprimir(Request $request)
  {
    $user = Auth::user();
    //$trackings = $user->trackings;
    $trackings = $request->get('trackings');
    foreach ($trackings as $key => $tracking) {
      $trackings[$key] = json_decode($tracking);
    }
    $pdf = \PDF::loadView('pdf', compact('trackings', 'user'))->setPaper('a4', 'landscape');
    return $pdf->download('trackings.pdf');
  }
  public function excel(Request $request)
  {
    $trackings = $request->get('trackings');
    foreach ($trackings as $key => $tracking) {
      $trackings[$key] = json_decode($tracking);
    }
    return view('excel', compact('trackings'));
  }
}
