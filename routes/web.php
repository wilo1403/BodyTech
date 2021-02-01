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
Route::resource('cities', 'CityController');
Route::resource('clients', 'ClientController');
Route::get('delete-clients/{id}', 'ClientController@delete');
Route::get('/clients-list', 'ClientController@index');


Route::get('/', function () {
    return view('welcome');
});

