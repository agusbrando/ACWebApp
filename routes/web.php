<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::resource('asignaturas', 'AsignaturaController');
Route::resource('evaluaciones', 'EvaluacionesController');
Route::resource('porcentajes', 'PorcentajesController');
Route::resource('desglose', 'DesgloseController');

Route::get('porcentajes/evaluacion/{id}', 'PorcentajesController@index');
Route::get('porcentajes/create/{id}', 'PorcentajesController@create');
Route::post('porcentajes/updatePorcentaje', 'PorcentajesController@update')->name('porcentajes.update');

Route::get('evaluaciones/desglose/{id}', 'DesgloseController@create');
Route::post('desglose/storeNotes', 'DesgloseController@storeNotes')->name('desglose.storeNotes');
Route::post('desglose/updateNotes', 'DesgloseController@updateNotes')->name('desglose.updateNotes');
Route::post('desglose/updateTrabajos', 'DesgloseController@updateTrabajos')->name('desglose.updateTrabajos');
Route::post('desglose/updateActitud', 'DesgloseController@updateActitud')->name('desglose.updateActitud');
Route::post('desglose/updateRecuperacion', 'DesgloseController@updateRecuperacion')->name('desglose.updateRecuperacion');

Route::get('tareas/{id}', 'DesgloseController@eliminar');
Route::get('tareas/eliminar/{task_id}/{subject_id}', 'DesgloseController@destroy');

Route::get('asignaturas/{id}', 'asignaturaController@show');

Route::get('evaluaciones/desglose/{subject_id}/{evaluation_id}', 'EvaluacionesController@show');

Route::resource('permissions','PermissionController');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');

