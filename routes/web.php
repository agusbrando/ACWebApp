<?php

use App\Models\Misbehavior;
use App\Models\Subject;
use App\Models\SessionTimetable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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

Route::resource('asistencia', 'AsistenciaController');
Route::resource('comportamiento', 'ComportamientoController');
Route::resource('faltas', 'FaltasController');
Route::get('/prueba', function () {

    $user_id = 1;
    $typeFaltaAsistencia = 1;
    $faltas = Misbehavior::all()->where('user_id', $user_id)->where('type_id', $typeFaltaAsistencia);
    $subjects = Subject::all();

    $lista = [];

    foreach ($subjects as $subject) {
        $timetables = $subject->timetables;
        $count = 0;
        foreach ($timetables as $timetable) {
            $misbehaviours = Misbehavior::all()->where('session_timetable_id', $timetable->id);
            if ($misbehaviours != null) {
                foreach ($misbehaviours as $misbehaviour) {
                    if ($misbehaviour->user_id == $user_id) {
                        $count = $count + 1;
                    }
                }
            }
        }
        $elemento = ['asignatura' => $subject->name, 'faltas' => $count, 'max' => $subject->maxFaltas];
        array_push($lista, $elemento);
    }

    echo var_dump($lista);
});
Route::resource('permissions','PermissionController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index');
