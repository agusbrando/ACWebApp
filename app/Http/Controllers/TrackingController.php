<?php

namespace App\Http\Controllers;
use App\Models\Tracking;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index(){

        $month = date("Y-m");
        $data = $this->calendar_month($month);
        $mes = $data['month'];
        // obtener mes en espanol
        $mespanish = $this->spanish_month($mes);
        $mes = $data['month'];
  
        return view("index",[
          'data' => $data,
          'mes' => $mes,
          'mespanish' => $mespanish
        ]);
  
    }
    public function index_month($month){

        $data = $this->calendar_month($month);
        $mes = $data['month'];
        // obtener mes en espanol
        $mespanish = $this->spanish_month($mes);
        $mes = $data['month'];
  
        return view("index",[
          'data' => $data,
          'mes' => $mes,
          'mespanish' => $mespanish
        ]);
  
      }
}
