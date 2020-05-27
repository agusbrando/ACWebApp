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

//RUTAS EVENTS (AGUSIN NICOLAS Y KEVIN)
Route::resource('events', 'CalendarController')->middleware('auth');
Route::get('events/edit/{id}',['as' => 'events.showedit', 'uses' => 'CalendarController@show'])->middleware('auth'); //TODO Revisad esta ruta. Debe estar en resources por lo que esta duplicada
Route::get('/crearEvento/{fecha}/{hora}/{tipo}','CalendarController@crearEvento')->name('crearEvento')->middleware('auth');
Route::post('/crearEvento','CalendarController@store')->middleware('auth');
Route::get('/time', 'CalendarController@getTime')->middleware('auth');
Route::get('/list', 'CalendarController@getList')->middleware('auth');
Route::get('/teacher', 'CalendarController@getTeacher')->middleware('auth');

//RUTAS CLASSROOMS(KEVIN)
Route::resource('classrooms','ClassroomController')->middleware('auth');

//RUTAS EVALUATIONS(KEVIN)
Route::resource('evaluations','EvaluationController')->middleware('auth');

//RUTAS SESSIONS(KEVIN)
Route::resource('sessions','SessionController')->middleware('auth');

//RUTAS SUBJECTS(KEVIN)
Route::resource('subjects','SubjectController')->middleware('auth');

//RUTAS TYPES(KEVIN)
Route::resource('types','TypeController')->middleware('auth');

//RUTAS ASISTENCIA Y COMPORTAMIENTO

Route::get('porcentajes/evaluacion/{id}', 'PorcentajesController@index')->middleware('auth');
Route::get('porcentajes/create/{id}', 'PorcentajesController@create')->middleware('auth');
Route::post('porcentajes/updatePorcentaje', 'PorcentajesController@update')->name('porcentajes.update')->middleware('auth');
Route::resource('asignaturas', 'AsignaturaController')->middleware('auth');
Route::resource('evaluaciones', 'EvaluacionesController')->middleware('auth');
Route::resource('porcentajes', 'PorcentajesController')->middleware('auth');
Route::resource('desglose', 'DesgloseController')->middleware('auth');
//RUTAS ASISTENCIA Y COMPORTAMIENTO (Alberto)
Route::resource('asistencia', 'AsistenciaController')->middleware('auth');
Route::resource('comportamiento', 'ComportamientoController')->middleware('auth');
Route::get('faltas/create/{id}', 'FaltasController@create')->middleware('auth');
Route::delete('faltas/{user_id}/{id}', 'FaltasController@destroy')->name('faltas.destroy1')->middleware('auth');
Route::post('faltas/{id}/create', 'FaltasController@create')->name('faltas.crear')->middleware('auth');
Route::resource('faltas', 'FaltasController')->middleware('auth');
Route::post('asistencia/lista', 'AsistenciaController@filter')->name('asistencia.filter')->middleware('auth');

//Route::Trackings (Carlos)
Route::post('seguimiento/imprimir', 'TrackingController@imprimir')->name('seguimiento.print')->middleware('auth');
Route::post('seguimiento/excel', 'TrackingController@excel')->name('seguimiento.excel')->middleware('auth');
Route::get('seguimiento/filtrar','TrackingController@filtrar')->name('seguimiento.filtrar')->middleware('auth');
Route::get('seguimiento','TrackingController@fileStorageServe')->middleware('auth');
Route::resource('seguimiento', 'TrackingController')->middleware('auth');
Route::get('seguimiento','TrackingController@index')->middleware('auth');
Route::post('seguimiento','TrackingController@store')->name('seguimiento.store')->middleware('auth');

//Route::Timetables (Carlos)
Route::resource('horarios', 'TimetableController')->middleware('auth');
Route::resource('sessiontimetable', 'SessionTimetableController')->middleware('auth');
Route::get('sessiontimetable/crear/{id}', 'SessionTimetableController@crear')->name('session')->middleware('auth');
Route::get('sessiontimetable/{session_id}/{timetable_id}', 'SessionTimetableController@show')->name('session.show')->middleware('auth');
Route::post('horario/imprimir/{id}', 'TimetableController@imprimir')->name('horario.print')->middleware('auth');

Route::get('horarios/{id}/Ind', 'TimetableController@horario')->name('Ind')->middleware('auth');

//RUTAS PERMISSIONS (Roby)
Route::post('/permissions/assignPermissionRole','PermissionController@assignPermissionRole')->name('permission.assign')->middleware('auth');
Route::resource('permissions','PermissionController')->middleware('auth');

//RUTAS ROLES (Roby)
Route::resource('roles','RoleController')->middleware('auth');

//RUTAS USERS (Roby)
Route::resource('users','UserController')->middleware('auth');

//RUTAS HOME (Roby)
Route::get('/', 'HomeController@index');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')


//RUTAS ITEMs Sergio Lopez
Route::post('/items/filter', 'ItemController@filter')->middleware('auth');
//update
Route::patch('/items/show/edit/{item_id}', 'ItemController@update')->name('items.updateItem')->middleware('auth');
Route::resource('items', 'ItemController')->middleware('auth');

//RUTAS STATESs Sergio Lopez
Route::resource('states', 'StateController')->middleware('auth');

//RUTAS COURSEs Sergio Lopez
Route::get('courses', 'CourseController@index')->middleware('auth');
Route::get('courses/show/{item_id}', 'CourseController@showItem')->name('courses.showItem')->middleware('auth');
Route::get('courses/show/{course_id}/{year_id}', 'CourseController@show')->name('courses.show')->middleware('auth');
//filtro
Route::post('courses/show/filter/{course_id}/{year_id}', 'CourseController@filter')->name('courses.filter')->middleware('auth');
Route::post('courses/show/filter/{user_id}/{course_id}/{year_id}', 'CourseController@responsabilizarItem')->name('courses.responsabilizarItem')->middleware('auth');
//eliminar
Route::delete('courses/show/{course_id}/{year_id}', 'CourseController@eliminarYearUnion')->name('courses.eliminarYearUnion')->middleware('auth');
// Route::resource('courses', 'CourseController');
//Imprimir
Route::post('courses/show/imprimir/{course_id}/{year_id}', 'CourseController@imprimir')->name('courses.print')->middleware('auth');
//Asignar
Route::get('courses/asignarAsignaturas', 'CourseController@asignarAsignaturas')->name('courses.asignarAsignaturas')->middleware('auth');

//RUTAS SUBJECTS JAVI
//TODO Revisar rutas distintas y poner mismmo prefijo a mismo tipo
Route::get('subjects/evaluations/{subject_id}', 'SubjectController@evaluations')->name('subjects.evaluations')->middleware('auth');
Route::get('desglose', 'SubjectController@desglose')->name('subjects.desglose')->middleware('auth');
Route::resource('subjects','SubjectController')->middleware('auth');
Route::resource('evaluations','EvaluationController')->middleware('auth');
Route::resource('tasks', 'TaskController')->middleware('auth');

Route::post('desglose', 'SubjectController@desglose')->name('subject.desglose')->middleware('auth');
Route::get('tareas/{id}', 'DesgloseController@eliminar')->middleware('auth');
Route::get('tareas/eliminar/{task_id}/{yearUnion_id}', 'DesgloseController@destroy')->name('desglose.destroy')->middleware('auth');
Route::get('desglose/crearTarea/{id}', 'TaskController@create')->middleware('auth');

Route::post('desglose/storeNotes', 'DesgloseController@storeNotes')->name('desglose.storeNotes')->middleware('auth');
Route::post('desglose/updateNotes', 'DesgloseController@updateNotes')->name('desglose.updateNotes')->middleware('auth');
Route::post('desglose/updateTrabajos', 'DesgloseController@updateTrabajos')->name('desglose.updateTrabajos')->middleware('auth');
Route::post('desglose/updateActitud', 'DesgloseController@updateActitud')->name('desglose.updateActitud')->middleware('auth');
Route::post('desglose/updateRecuperacion', 'DesgloseController@updateRecuperacion')->name('desglose.updateRecuperacion')->middleware('auth');
Route::post('porcentajes/updatePorcentaje', 'PorcentajesController@update')->name('porcentajes.update')->middleware('auth');

//INICIO Rutas de Temporalizacion de la programacion (Jesus)
Route::get('/misProgramaciones','ProgramController@myPrograms')->name('myPrograms')->middleware('auth');
Route::resource('units', 'UnitController')->middleware('auth');
Route::get('programs/{program_id}/aspect/create', 'ProgramController@createAspecto')->name('programs.createAspecto')->middleware('auth');
Route::get('programs/{program_id}/unit/create', 'UnitController@create')->name('units.create')->middleware('auth');
Route::get('programs/{program_id}/unit/{id}/edit', 'UnitController@edit')->name('units.edit')->middleware('auth');
Route::get('programs/{program_id}/unit/{id}/', 'UnitController@show')->name('units.show')->middleware('auth');
Route::resource('notesPercentages', 'NotesPercentagesController')->middleware('auth');
Route::resource('programs', 'ProgramController')->middleware('auth');
Route::post('programs/{id}/unit','ProgramController@storeUnit')->name('programs.storeUnit')->middleware('auth');
Route::post('programs/{id}/evaluar','ProgramController@storeEvaluacion')->name('programs.storeEvaluacion')->middleware('auth');
Route::post('programs/{id}/aspecto','ProgramController@storeAspecto')->name('programs.storeAspecto')->middleware('auth');
Route::patch('programs/{program_id}/unit/{id}','ProgramController@updateUnit')->name('programs.updateUnit')->middleware('auth');
Route::patch('programs/{program_id}/aspecto/{id}','ProgramController@updateAspecto')->name('programs.updateAspecto')->middleware('auth');
Route::delete('programs/{program_id}/unit/{id}','ProgramController@destroyUnit')->name('programs.destroyUnit')->middleware('auth');
Route::delete('programs/{program_id}/aspecto/{id}','ProgramController@destroyAspecto')->name('programs.destroyAspecto')->middleware('auth');
Route::get('programs/{program_id}/aspecto/{id}/edit','ProgramController@editarAspecto')->name('programs.editarAspecto')->middleware('auth');
Route::get('programs/{program_id}/PDF','ProgramController@downloadPDF')->name('programs.PDF')->middleware('auth');
Route::get('programs/{program_id}/Excel','ProgramController@downloadExcel')->name('programs.Excel')->middleware('auth');

// Route Messages (Sergio Falco)
Route::resource('messages', 'MessageController')->middleware('auth');
Route::get('messages_send', 'MessageController@index')->middleware('auth')->name('messagesSend.index');
Route::get('download_attachment_message/{idm}/{nameAttach}','MessageController@download')->name('downloadmessagefile');
Route::get('sended/{id}', 'MessageController@showSended')->middleware('auth');
Route::get('response/{id}', 'MessageController@create')->middleware('auth');
Route::resource('notifications', 'NotificationController')->middleware('auth');

//RUTAS ITEMs
Route::post('/items/filter', 'ItemController@filter')->middleware('auth');
Route::resource('items', 'ItemController')->middleware('auth');

//Rutas Posts Adrian
Route::resource('posts', 'PostController')->middleware('auth');
//Rutas Comments Adrian
Route::resource('comments', 'CommentController')->middleware('auth');

//Rutas Attachments Adrian
Route::resource('attachments', 'AttachmentController')->middleware('auth');
