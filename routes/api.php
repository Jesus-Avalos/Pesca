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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth']], function () {
    Route::post('torneo','TorneoController@store');
    Route::get('torneo/getResults/{torneo}','TorneoController@getResults');
    Route::post('orilla','OrillaController@store');
    Route::post('orilla/delete','OrillaController@destroy');
    Route::put('orilla/{orilla}','OrillaController@update');
    Route::post('equipo','EmbarcacionController@store');
    Route::put('equipo/{equipo}','EmbarcacionController@update');
    Route::post('equipo/delete','EmbarcacionController@destroy');
    Route::post('golon','GolonController@store');
});

