<?php

use Illuminate\Support\Facades\Route;
use App\Models\Misbehavior;
use App\Models\Task;

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

Route::get('/prueba', function (Request $request) {

    $item = Item::find(1);
    
    foreach($item->yearUnionUsers as $yearUnionUser){
        echo ($yearUnionUser->yearUnion->subject).'<br>';
        
    }
    


})->name('prueba');

Route::get('/misProgramaciones','ProgramController@myPrograms')->name('myPrograms');

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
