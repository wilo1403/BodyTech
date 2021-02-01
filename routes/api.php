<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/select_municipality/{departament_code}', 'CityController@select_municipality')->name('city.select_municipality');
Route::get('/clients-list', 'ClientController@index')->name('clients.list');
Route::get('/destroy/{id}', 'ClientController@delete')->name('client.delete');
