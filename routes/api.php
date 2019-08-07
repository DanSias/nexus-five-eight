<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->group(function () {

    // Users
    Route::post('/users', 'UserController@store');
    Route::get('/users/{user}', 'UserController@show');
    Route::patch('/users/{user}', 'UserController@update');
    Route::delete('/users/{user}', 'UserController@destroy');

    // Notes
    Route::post('/notes', 'NoteController@store');
    Route::get('/notes/{user}', 'NoteController@show');
    Route::patch('/notes/{user}', 'NoteController@update');
    Route::delete('/notes/{user}', 'NoteController@destroy');
    
});
