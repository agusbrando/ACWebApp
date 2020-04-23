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




// Route::get('/login', function () {
//     return view('login');
// });
//  Route::get('/', function () {   
//      return view('auth.login');
//  });

Route::resource('permissions','PermissionController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/stock', function () {
    return view('stock');
});
Route::get('/', 'HomeController@index');
    



Route::post('/items/filter', 'ItemController@filter');
Route::resource('items', 'ItemController');
