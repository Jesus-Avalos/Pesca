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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home','HomeController@index');
    Route::get('/torneo/result/{torneo}','TorneoController@results');
    Route::get('/torneo/{torneo}','TorneoController@show');
    Route::get('/torneo/start/{torneo}','TorneoController@start');
    Route::view('/personas', 'datos.personas', ['personas' => \App\Models\Persona::all()]);
    Route::view('/equipos', 'datos.equipos', ['equipos' => \App\Models\Equipo::all()]);
});