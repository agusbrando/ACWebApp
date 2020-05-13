<?php

use App\Models\Misbehavior;
use App\Models\SessionTimetable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Program;
use App\Models\User;
use App\Models\Item;
use App\Models\ItemYear;

use App\Models\Unit;
use App\Models\Evaluable;
use App\Models\Evaluated;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\DB;

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
Route::get('/prueba', function () {
    $lista = Misbehavior::all();
    foreach ($lista as $misbehavior) {
        echo ($misbehavior->id);
    }
});

Route::get('/prueba', function (Request $request) {

    $item = Item::find(1);
    $subject = Subject::find(1);
    $user = User::find(9);

    foreach ($user->yearUnions as $yearUnion) {

        if ($yearUnion->subject_id == 1) {
            foreach ($yearUnion->pivot->misbehavours as $falta) {
                echo ($yearUnion->subject->name) . ' - ' . ($falta->description) . ' - ' . ($falta->date) . '<br>';
            }
        }

        Route::get('/login', function () {
            return view('welcome');
        });

        Route::get('/', function () {
            return view('welcome');
        });
    }

    foreach ($user->yearUnions->where('subject_id', 1)->where('evaluation_id', 1) as $yearUnion) {


        foreach ($yearUnion->pivot->tasks->where('type_id', 8) as $tarea) {
            echo ($yearUnion->subject->name) . ' - ' . ($tarea->name) . ' - ' . ($tarea->pivot->value) . '<br>';
        }
    }
})->name('prueba');

Route::get('/misProgramaciones', 'ProgramController@myPrograms')->name('myPrograms');

Route::resource('units', 'UnitController');
Route::get('programs/{program_id}/unit/create', 'UnitController@create')->name('units.create');
Route::get('programs/{program_id}/unit/{id}/edit', 'UnitController@edit')->name('units.edit');
Route::get('programs/{program_id}/unit/{id}/', 'UnitController@show')->name('units.show');

Route::resource('notesPercentages', 'NotesPercentagesController');
Route::resource('programs', 'ProgramController');
Route::post('programs/{id}/unit', 'ProgramController@storeUnit')->name('programs.storeUnit');
Route::post('programs/{id}/aspecto', 'ProgramController@storeAspecto')->name('programs.storeAspecto');
Route::patch('programs/{program_id}/unit/{id}', 'ProgramController@updateUnit')->name('programs.updateUnit');
Route::patch('programs/{program_id}/aspecto/{id}', 'ProgramController@updateAspecto')->name('programs.updateAspecto');
Route::delete('programs/{program_id}/unit/{id}', 'ProgramController@destroyUnit')->name('programs.destroyUnit');
Route::delete('programs/{program_id}/aspecto/{id}', 'ProgramController@destroyAspecto')->name('programs.destroyAspecto');
Route::get('programs/{program_id}/aspecto/{id}/edit', 'ProgramController@editarAspecto')->name('programs.editarAspecto');

// Route::get('faltas/{id}/', 'FaltasController@indexFaltas')->name('faltas.indexFaltas');
Route::resource('permissions', 'PermissionController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index');
Route::get('/stock', function () {
    return view('stock');
});
Route::get('/', 'HomeController@index');



//RUTAS ITEMs
Route::post('/items/filter', 'ItemController@filter');
// Route::post('/items/edit', 'ItemController@edit');
Route::resource('items', 'ItemController');
