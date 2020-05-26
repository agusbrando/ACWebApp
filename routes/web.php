<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Subject;

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

Route::get('prueba', function () {
    
    echo var_dump(Subject::find(4)->hours);
});



//RUTAS EVENTS (AGUSIN NICOLAS Y KEVIN)
Route::resource('events', 'CalendarController');
Route::get('events/edit/{id}',['as' => 'events.showedit', 'uses' => 'CalendarController@show']); //TODO Revisad esta ruta. Debe estar en resources por lo que esta duplicada
Route::get('/crearEvento/{fecha}/{hora}/{tipo}','CalendarController@crearEvento')->name('crearEvento');
Route::post('/crearEvento','CalendarController@store');
Route::get('/time', 'CalendarController@getTime');
Route::get('/list', 'CalendarController@getList');

//RUTAS CLASSROOMS(KEVIN)
Route::resource('classrooms','ClassroomController');

//RUTAS EVALUATIONS(KEVIN)
Route::resource('evaluations','EvaluationController');

//RUTAS SESSIONS(KEVIN)
Route::resource('sessions','SessionController');

//RUTAS SUBJECTS(KEVIN)
Route::resource('subjects','SubjectController');

//RUTAS TYPES(KEVIN)
Route::resource('types','TypeController');

//RUTAS ASISTENCIA Y COMPORTAMIENTO (Alberto)
Route::resource('asistencia', 'AsistenciaController');
Route::get('porcentajes/evaluacion/{id}', 'PorcentajesController@index');
Route::get('porcentajes/create/{id}', 'PorcentajesController@create');
Route::post('porcentajes/updatePorcentaje', 'PorcentajesController@update')->name('porcentajes.update');
Route::resource('asignaturas', 'AsignaturaController');
Route::resource('evaluaciones', 'EvaluacionesController');
Route::resource('porcentajes', 'PorcentajesController');
Route::resource('desglose', 'DesgloseController');
//RUTAS ASISTENCIA Y COMPORTAMIENTO
Route::resource('comportamiento', 'ComportamientoController');
Route::get('faltas/create/{id}', 'FaltasController@create');
Route::delete('faltas/{user_id}/{id}', 'FaltasController@destroy')->name('faltas.destroy1');
Route::post('faltas/{id}/create', 'FaltasController@create')->name('faltas.crear');
Route::resource('faltas', 'FaltasController');

//Route::Trackings (Carlos)
Route::post('seguimiento/imprimir', 'TrackingController@imprimir')->name('seguimiento.print');
Route::post('seguimiento/excel', 'TrackingController@excel')->name('seguimiento.excel');
Route::get('seguimiento/filtrar','TrackingController@filtrar')->name('seguimiento.filtrar');
Route::get('seguimiento','TrackingController@fileStorageServe');
Route::resource('seguimiento', 'TrackingController');
Route::get('seguimiento','TrackingController@index');
Route::post('seguimiento','TrackingController@store')->name('seguimiento.store');

//Route::Timetables (Carlos)
Route::resource('horarios', 'TimetableController');
Route::get('horarios/{id}/Ind', 'TimetableController@horario')->name('Ind');

//RUTAS PERMISSIONS (Roby)
Route::post('/permissions/assignPermissionRole','PermissionController@assignPermissionRole')->name('permission.assign');
Route::resource('permissions','PermissionController');

//RUTAS ROLES (Roby)
Route::resource('roles','RoleController');

//RUTAS USERS (Roby)
Route::resource('users','UserController');

//RUTAS HOME (Roby)
Route::get('/', 'HomeController@index');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


//RUTAS ITEMs Sergio Lopez
Route::post('/items/filter', 'ItemController@filter');
//update
Route::patch('/items/show/edit/{item_id}', 'ItemController@update')->name('items.updateItem');
Route::resource('items', 'ItemController');

//RUTAS STATESs Sergio Lopez
Route::resource('states', 'StateController');

//RUTAS COURSEs Sergio Lopez
Route::get('courses/show/{item_id}', 'CourseController@showItem')->name('courses.showItem');
Route::get('courses/show/{course_id}/{year_id}', 'CourseController@show')->name('courses.show');
//filtro
Route::post('courses/show/filter/{course_id}/{year_id}', 'CourseController@filter')->name('courses.filter');
Route::post('courses/show/filter/{user_id}/{course_id}/{year_id}', 'CourseController@responsabilizarItem')->name('courses.responsabilizarItem');
//eliminar
Route::delete('courses/show/{course_id}/{year_id}', 'CourseController@eliminarYearUnion')->name('courses.eliminarYearUnion');
// Route::resource('courses', 'CourseController');
//Imprimir
Route::post('courses/show/imprimir/{course_id}/{year_id}', 'CourseController@imprimir')->name('courses.print');
//Asignar
Route::get('courses/asignarAsignaturas', 'CourseController@asignarAsignaturas')->name('courses.asignarAsignaturas');

//RUTAS SUBJECTS JAVI
//TODO Revisar rutas distintas y poner mismmo prefijo a mismo tipo
Route::get('subjects/evaluations/{subject_id}', 'SubjectController@evaluations')->name('subjects.evaluations');
Route::get('desglose', 'SubjectController@desglose')->name('subjects.desglose');
Route::resource('subjects','SubjectController');
Route::resource('evaluations','EvaluationController');
Route::resource('tasks', 'TaskController');

Route::post('desglose', 'SubjectController@desglose')->name('subject.desglose');;
Route::get('tareas/{id}', 'DesgloseController@eliminar');
Route::get('tareas/eliminar/{task_id}/{subject_id}', 'DesgloseController@destroy');
Route::get('desglose/crearTarea/{id}', 'TaskController@create');

Route::post('desglose/storeNotes', 'DesgloseController@storeNotes')->name('desglose.storeNotes');
Route::post('desglose/updateNotes', 'DesgloseController@updateNotes')->name('desglose.updateNotes');
Route::post('desglose/updateTrabajos', 'DesgloseController@updateTrabajos')->name('desglose.updateTrabajos');
Route::post('desglose/updateActitud', 'DesgloseController@updateActitud')->name('desglose.updateActitud');
Route::post('desglose/updateRecuperacion', 'DesgloseController@updateRecuperacion')->name('desglose.updateRecuperacion');
Route::post('porcentajes/updatePorcentaje', 'PorcentajesController@update')->name('porcentajes.update');

//INICIO Rutas de Temporalizacion de la programacion (Jesus)
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

// Route Messages (Sergio Falco)
Route::resource('messages', 'MessageController')->middleware('auth');
Route::get('messages_send', 'MessageController@index')->middleware('auth')->name('messagesSend.index');
Route::get('download_attachment_message/{idm}/{nameAttach}','MessageController@download')->name('downloadmessagefile');
Route::get('sended/{id}', 'MessageController@showSended')->middleware('auth');
Route::get('response/{id}', 'MessageController@create')->middleware('auth');
Route::resource('notifications', 'NotificationController')->middleware('auth');

//RUTAS ITEMs
Route::post('/items/filter', 'ItemController@filter');
Route::resource('items', 'ItemController');

//Rutas Posts Adrian
Route::resource('posts', 'PostController');

//Rutas Comments Adrian
Route::resource('comments', 'CommentController');

//Rutas Attachments Adrian
Route::resource('attachments', 'AttachmentController');
