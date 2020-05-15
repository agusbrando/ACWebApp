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

// Route::get('/calendar/{mes}','CalendarController@index_month');
// Route::get('/calendar','CalendarController@index');
// Route::post('/event/store','CalendarController@store');
// Route::post('/event/create','CalendarController@create');
// Route::put('/event/destroy/{id}','CalendarController@destroy');
// Route::put('/event/update','CalendarController@update');
// Route::get('/event/details/{id}','CalendarController@details');


Route::resource('events', 'CalendarController');
Route::get('events/edit/{id}',['as' => 'events.showedit', 'uses' => 'CalendarController@show']);

Route::resource('asistencia', 'AsistenciaController');
Route::get('porcentajes/evaluacion/{id}', 'PorcentajesController@index');
Route::get('porcentajes/create/{id}', 'PorcentajesController@create');
Route::post('porcentajes/updatePorcentaje', 'PorcentajesController@update')->name('porcentajes.update');
Route::resource('asignaturas', 'AsignaturaController');
Route::resource('evaluaciones', 'EvaluacionesController');
Route::resource('porcentajes', 'PorcentajesController');
Route::resource('desglose', 'DesgloseController');
Route::resource('comportamiento', 'ComportamientoController');
Route::get('faltas/create/{id}', 'FaltasController@create');
Route::delete('faltas/{user_id}/{id}', 'FaltasController@destroy')->name('faltas.destroy1');
Route::post('faltas/{id}/create', 'FaltasController@create')->name('faltas.crear');
Route::resource('faltas', 'FaltasController');
Route::get('evaluaciones/desglose/crearTarea/{id}/{eval_id}', 'DesgloseController@create');
Route::post('desglose/storeNotes', 'DesgloseController@storeNotes')->name('desglose.storeNotes');
Route::post('desglose/updateNotes', 'DesgloseController@updateNotes')->name('desglose.updateNotes');
Route::post('desglose/updateTrabajos', 'DesgloseController@updateTrabajos')->name('desglose.updateTrabajos');
Route::post('desglose/updateActitud', 'DesgloseController@updateActitud')->name('desglose.updateActitud');
Route::post('desglose/updateRecuperacion', 'DesgloseController@updateRecuperacion')->name('desglose.updateRecuperacion');
Route::resource('units', 'UnitController');

Route::resource('notesPercentages', 'NotesPercentagesController');

//INICIO Rutas de Temporalizacion de la programacion


Route::get('/misProgramaciones','ProgramController@myPrograms')->name('myPrograms');

Route::resource('units', 'UnitController');
Route::get('programs/{program_id}/unit/create', 'UnitController@create')->name('units.create');
Route::get('programs/{program_id}/unit/{id}/edit', 'UnitController@edit')->name('units.edit');
Route::get('programs/{program_id}/unit/{id}/', 'UnitController@show')->name('units.show');

Route::resource('programs', 'ProgramController');
Route::post('programs/{id}/unit','ProgramController@storeUnit')->name('programs.storeUnit');
Route::post('programs/{id}/evaluar','ProgramController@storeEvaluacion')->name('programs.storeEvaluacion');
Route::post('programs/{id}/aspecto','ProgramController@storeAspecto')->name('programs.storeAspecto');
Route::patch('programs/{program_id}/unit/{id}','ProgramController@updateUnit')->name('programs.updateUnit');
Route::patch('programs/{program_id}/aspecto/{id}','ProgramController@updateAspecto')->name('programs.updateAspecto');
Route::delete('programs/{program_id}/unit/{id}','ProgramController@destroyUnit')->name('programs.destroyUnit');
Route::delete('programs/{program_id}/aspecto/{id}','ProgramController@destroyAspecto')->name('programs.destroyAspecto');
Route::get('programs/{program_id}/aspecto/{id}/edit','ProgramController@editarAspecto')->name('programs.editarAspecto');

//FIN Rutas de Temporalizacion de la programacion


Route::get('tareas/{id}', 'DesgloseController@eliminar');
Route::get('tareas/eliminar/{task_id}/{subject_id}', 'DesgloseController@destroy');
//Route::Trackings carlos
Route::post('/imprimir', 'TrackingController@imprimir')->name('print');
Route::post('/excel', 'TrackingController@excel')->name('excel');
Route::get('seguimiento/filtrar','TrackingController@filtrar')->name('seguimiento.filtrar');
Route::get('seguimiento','TrackingController@fileStorageServe');
Route::resource('seguimiento', 'TrackingController');
Route::get('seguimiento','TrackingController@index');
Route::post('seguimiento','TrackingController@store')->name('seguimiento.store');
//Route::Timetables carlos
Route::resource('horarios', 'TimetableController');
Route::get('horarios/{id}/Ind', 'TimetableController@horario')->name('Ind');

Route::resource('roles','RoleController');
Route::resource('permissions','PermissionController');
Route::resource('classrooms','ClassroomController');
Route::resource('evaluations','EvaluationController');
Route::resource('states','StateController');
Route::resource('sessions','SessionController');
Route::resource('subjects','SubjectController');
Route::resource('types','TypeController');
Route::resource('users','UserController');
Route::get('evaluaciones/desglose/{subject_id}/{evaluation_id}', 'EvaluacionesController@show');
Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('messages', 'MessageController')->middleware('auth');

Route::get('messages_send', 'MessageController@index')->middleware('auth')->name('messagesSend.index');

Route::get('download_attachment_message/{idm}/{nameAttach}','MessageController@download')->name('downloadmessagefile');

Route::get('sended/{id}', 'MessageController@showSended')->middleware('auth');

Route::get('response/{id}', 'MessageController@create')->middleware('auth');

Route::get('/', 'HomeController@index');

Route::get('/stock', function () {
    return view('stock');
});
Route::get('/', 'HomeController@index');



//RUTAS ITEMs Sergio Lopez
Route::post('/items/filter', 'ItemController@filter');
Route::resource('items', 'ItemController');

//RUTAS STATEs
Route::resource('states', 'StateController');

//RUTAS COURSEs Sergio Lopez
Route::get('courses/show/{item_id}', 'CourseController@showItem')->name('courses.showItem');
Route::get('courses/show/{course_id}/{year_id}', 'CourseController@show')->name('courses.show');
Route::resource('courses', 'CourseController');
