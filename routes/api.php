<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->group(function () {
    Route::post('/users', 'UserController@store');
    Route::get('/users/{user}', 'UserController@show');
    Route::patch('/users/{user}', 'UserController@update');
    Route::delete('/users/{user}', 'UserController@destroy');
});
