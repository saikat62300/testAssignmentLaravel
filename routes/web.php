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


Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');

Auth::routes();
Route::get('/', 'AuthController@login');
Route::get('/login', 'AuthController@login');
Route::post('/login', 'AuthController@login')->name('login');
Route::get('/logout', 'AuthController@getLogout')->name('logout');

Route::get('/manageFlims', 'FlimController@index')->name('flim.index');
Route::get('/manageFlims-data', 'FlimController@data');
Route::match(['get', 'post'], '/addFlim', 'FlimController@add')->name('flim.add');
Route::match(['get', 'post'], '/updateFlim', 'FlimController@update')->name('flim.update');
Route::any('/removeFlim', 'FlimController@remove')->name('flim.remove');
Route::get('/viewFlim', 'FlimController@view')->name('flim.view');
Route::get('/getFlims', 'FlimController@getFlims')->name('flim.getFlims');