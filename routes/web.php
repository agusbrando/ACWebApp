<?php

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

// Route::get('/calendar/{mes}','CalendarController@index_month');
// Route::get('/calendar','CalendarController@index');

Route::resource('calendar', 'CalendarController');

// Route::post('/event/store','CalendarController@store');
// Route::post('/event/create','CalendarController@create');
// Route::put('/event/destroy/{id}','CalendarController@destroy');
// Route::put('/event/update','CalendarController@update');
// Route::get('/event/details/{id}','CalendarController@details');


 Route::resource('event', 'CalendarController');



// Route::get('/login', function () {
//     return view('login');
// });
//  Route::get('/', function () {   
//      return view('auth.login');
//  });

Route::resource('permissions','PermissionController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index');

Route::put('/calendarTime/{id}', 'CalendarController@getTime');