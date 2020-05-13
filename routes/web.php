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

Route::get('/misProgramaciones','ProgramController@myPrograms')->name('myPrograms');
Route::get('evaluaciones/desglose/crearTarea/{id}/{eval_id}', 'DesgloseController@create');
Route::post('desglose/storeNotes', 'DesgloseController@storeNotes')->name('desglose.storeNotes');
Route::post('desglose/updateNotes', 'DesgloseController@updateNotes')->name('desglose.updateNotes');
Route::post('desglose/updateTrabajos', 'DesgloseController@updateTrabajos')->name('desglose.updateTrabajos');
Route::post('desglose/updateActitud', 'DesgloseController@updateActitud')->name('desglose.updateActitud');
Route::post('desglose/updateRecuperacion', 'DesgloseController@updateRecuperacion')->name('desglose.updateRecuperacion');
Route::resource('units', 'UnitController');
Route::get('programs/{program_id}/unit/create', 'UnitController@create')->name('units.create');
Route::get('programs/{program_id}/unit/{id}/edit', 'UnitController@edit')->name('units.edit');
Route::get('programs/{program_id}/unit/{id}/', 'UnitController@show')->name('units.show');

Route::resource('notesPercentages', 'NotesPercentagesController');
Route::resource('programs', 'ProgramController');
Route::post('programs/{id}/unit','ProgramController@storeUnit')->name('programs.storeUnit');
Route::post('programs/{id}/aspecto','ProgramController@storeAspecto')->name('programs.storeAspecto');
Route::patch('programs/{program_id}/unit/{id}','ProgramController@updateUnit')->name('programs.updateUnit');
Route::patch('programs/{program_id}/aspecto/{id}','ProgramController@updateAspecto')->name('programs.updateAspecto');
Route::delete('programs/{program_id}/unit/{id}','ProgramController@destroyUnit')->name('programs.destroyUnit');
Route::delete('programs/{program_id}/aspecto/{id}','ProgramController@destroyAspecto')->name('programs.destroyAspecto');
Route::get('programs/{program_id}/aspecto/{id}/edit','ProgramController@editarAspecto')->name('programs.editarAspecto');
Route::get('tareas/{id}', 'DesgloseController@eliminar');
Route::get('tareas/eliminar/{task_id}/{subject_id}', 'DesgloseController@destroy');

Route::get('asignaturas/{id}', 'asignaturaController@show');

Route::get('evaluaciones/desglose/{subject_id}/{evaluation_id}', 'EvaluacionesController@show');

Route::resource('permissions','PermissionController');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/stock', function () {
    return view('stock');
});
Route::get('/', 'HomeController@index');
    


//RUTAS ITEMs
Route::post('/items/filter', 'ItemController@filter');
// Route::post('/items/edit', 'ItemController@edit');
Route::resource('items', 'ItemController');
//RUTAS STATESs
Route::resource('states', 'StateController');
//RUTAS COURSEs
Route::get('courses/show/{course_id}/{year_id}', 'CourseController@show')->name('courses.show');
Route::resource('courses', 'CourseController');
