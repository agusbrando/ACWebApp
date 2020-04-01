<?php

use Illuminate\Support\Facades\Route;
use App\Program;
use App\User;
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
    
   
    $asignatura = Program::findorfail(1)->subject;

    echo $asignatura->name.'<br>';

    $id = DB::table('roles')->select('id')->where('name','Profesor')->get()->first()->id;


    $profesores = DB::table('users')->where('rol_id', $id)->get();

    foreach($profesores as $profesor){
        echo $profesor->first_name.'<br>';
    }
    //$asignatura->programaciones()->save($programacion);
   
    /*foreach ($evaluable->programs as $programacion){
        echo $programacion->pivot->created_at.'-----'.$programacion->pivot->description.'-----'.$programacion->id;
    }*/

});