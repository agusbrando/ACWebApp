<?php

use Illuminate\Support\Facades\Route;
use App\Programacion;
use App\Usuario;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/login', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});
Route::get('/prueba',function () {
    
   
    $evaluable = App\AspectoEvaluable::findorfail(1);
    $programacion = new Programacion([
        'f_comprobacion' => '2019-09-26',	
        'observaciones' => 'Muy bien estructurado',
        'id_profesor' => 3,
        'id_responsable' => 4
    ]);

    $asignatura = App\Asignatura::find(2);

    //$asignatura->programaciones()->save($programacion);
   
    foreach ($evaluable->programaciones as $programacion){
        echo $programacion->pivot->created_at.'-----'.$programacion->pivot->descripcion.'-----'.$programacion->id;
    }

});