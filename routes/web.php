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
Route::get('faltas/create/{id}', 'FaltasController@create');
Route::delete('faltas/{user_id}/{id}', 'FaltasController@destroy')->name('faltas.destroy1');
Route::post('faltas/{id}/create', 'FaltasController@create')->name('faltas.crear');
Route::resource('faltas', 'FaltasController');
// Route::get('/prueba', function () {
//     $lista = Misbehavior::all();
//     foreach($lista as $misbehavior){
//         echo ($misbehavior->id);
//     }

// });
// Route::get('faltas/{id}/', 'FaltasController@indexFaltas')->name('faltas.indexFaltas');
Route::resource('permissions', 'PermissionController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index');
