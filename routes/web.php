<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'PagesController@index');

Auth::routes();

Route::get('/admin', 'AdminController@index');
//Route::get('/group','GroupController@index');
Route::resource('group', 'GroupController');
Route::resource('part', 'PartController');
Route::get('/search', 'PartController@search');

Route::get('/home', 'HomeController@index')->name('home');

