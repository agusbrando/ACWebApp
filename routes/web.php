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




// Route::get('/login', function () {
//     return view('login');
// });
//  Route::get('/', function () {
//      return view('auth.login');
//  });




Route::resource('permissions','PermissionController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('messages', 'MessageController')->middleware('auth');

Route::get('messages_send', 'MessageController@index')->middleware('auth')->name('messagesSend.index');

Route::get('download_attachment_message/{idm}/{nameAttach}','MessageController@download')->name('downloadmessagefile');

Route::get('sended/{id}', 'MessageController@showSended')->middleware('auth');

Route::get('/', 'HomeController@index');

