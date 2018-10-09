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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/api/users', 'UserController@index');
Route::post('/api/users', 'UserController@store');
Route::get('user/{password}/{email}', 'UserController@login');
Route::resource('user', 'UserController');
Route::resource('spot', 'SpotController');
Route::resource('circuit', 'CircuitController');
Route::resource('spot', 'SpotController');
