<?php

use App\Http\Controllers\CalendarController;
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





Route::resource('asistencia', 'AsistenciaController');



Route::resource('comportamiento', 'ComportamientoController');
Route::get('faltas/create/{id}', 'FaltasController@create');
Route::delete('faltas/{user_id}/{id}', 'FaltasController@destroy')->name('faltas.destroy1');
Route::post('faltas/{id}/create', 'FaltasController@create')->name('faltas.crear');
Route::resource('faltas', 'FaltasController');
Route::get('/misProgramaciones','ProgramController@myPrograms')->name('myPrograms');

Route::resource('units', 'UnitController');
Route::get('programs/{program_id}/unit/create', 'UnitController@create')->name('units.create');
Route::get('programs/{program_id}/unit/{id}/edit', 'UnitController@edit')->name('units.edit');
Route::get('programs/{program_id}/unit/{id}/', 'UnitController@show')->name('units.show');
Route::resource('notesPercentages', 'NotesPercentagesController');
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
Route::post('seguimiento/imprimir', 'TrackingController@imprimir')->name('seguimiento.print');
Route::post('seguimiento/excel', 'TrackingController@excel')->name('seguimiento.excel');
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
Route::resource('users','UserController');
Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('messages', 'MessageController')->middleware('auth');

Route::get('messages_send', 'MessageController@index')->middleware('auth')->name('messagesSend.index');


Route::get('download_attachment_message/{idm}/{nameAttach}','MessageController@download')->name('downloadmessagefile');

Route::get('sended/{id}', 'MessageController@showSended')->middleware('auth');

Route::get('response/{id}', 'MessageController@create')->middleware('auth');


Route::get('/stock', function () {
    return view('stock');
});

//RUTAS PERMISSIONS ROBY
Route::post('/permissions/assignPermissionRole','PermissionController@assignPermissionRole')->name('permission.assign');
Route::resource('permissions','PermissionController');
//RUTAS ROLES ROBY
Route::resource('roles','RoleController');
//RUTAS USERS ROBY
Route::resource('users','UserController');
//RUTAS HOME ROBY
Route::get('/', 'HomeController@index');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


//RUTAS ITEMs Sergio Lopez
Route::post('/items/filter', 'ItemController@filter');
Route::resource('items', 'ItemController');
//RUTAS STATESs
Route::resource('states', 'StateController');
//RUTAS COURSEs

Route::get('courses/show/{item_id}', 'CourseController@showItem')->name('courses.showItem');
Route::get('courses/show/{course_id}/{year_id}', 'CourseController@show')->name('courses.show');
Route::resource('courses', 'CourseController');

//RUTAS SUBJECTS JAVI
// Route::resource('asignaturas', 'AsignaturaController');
Route::post('subjects/evaluations', 'SubjectController@evaluations')->name('subjects.evaluations');

Route::resource('subjects','SubjectController');
Route::resource('evaluations','EvaluationController');
Route::resource('tasks', 'TaskController');

Route::post('desglose', 'SubjectController@desglose')->name('subject.desglose');;
Route::get('tareas/{id}', 'DesgloseController@eliminar');
//TODO Pasar parametros con formulario/Eliminar ruta y poner destroy
Route::get('tareas/eliminar/{task_id}/{subject_id}', 'DesgloseController@destroy');
Route::get('evaluaciones/desglose/crearTarea/{id}', 'TaskController@create');

//TODO Cambiar controller de DesgloseController.
Route::post('desglose/storeNotes', 'DesgloseController@storeNotes')->name('desglose.storeNotes');
Route::post('desglose/updateNotes', 'DesgloseController@updateNotes')->name('desglose.updateNotes');
Route::post('desglose/updateTrabajos', 'DesgloseController@updateTrabajos')->name('desglose.updateTrabajos');
Route::post('desglose/updateActitud', 'DesgloseController@updateActitud')->name('desglose.updateActitud');
Route::post('desglose/updateRecuperacion', 'DesgloseController@updateRecuperacion')->name('desglose.updateRecuperacion');

Route::post('porcentajes/updatePorcentaje', 'PorcentajesController@update')->name('porcentajes.update');

//RUTAS EVENTS
Route::resource('events', 'CalendarController');
Route::get('events/edit/{id}',['as' => 'events.showedit', 'uses' => 'CalendarController@show']);
Route::get('/crearEvento/{fecha}/{hora}/{tipo}','CalendarController@crearEvento')->name('crearEvento');
Route::post('/crearEvento','CalendarController@store');
Route::get('/time', 'CalendarController@getTime');
Route::get('/list', 'CalendarController@getList');

//RUTAS CLASSROOMS
Route::resource('classrooms','ClassroomController');

//RUTAS EVALUATIONS
Route::resource('evaluations','EvaluationController');

//RUTAS SESSIONS
Route::resource('sessions','SessionController');

//RUTAS SUBJECTS
Route::resource('subjects','SubjectController');

//RUTAS TYPES
Route::resource('types','TypeController');
