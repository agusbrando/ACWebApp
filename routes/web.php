<?php

use Illuminate\Support\Facades\Route;
use App\Models\Subject;
use App\Models\Program;

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
    
   
    $programs = Subject::findorfail(3)->programs->pluck('id');
    echo $programs;
    $expected_programs = DB::table('programs')->where('subject_id', 3)->pluck('id');
    echo '<br>'.$expected_programs;
    //$asignatura->programaciones()->save($programacion);
   
    /*foreach ($evaluable->programs as $programacion){
        echo $programacion->pivot->created_at.'-----'.$programacion->pivot->description.'-----'.$programacion->id;
    }*/

});