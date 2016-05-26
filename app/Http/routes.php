<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'api/rest/'], function () {
    Route::post('login', 'AuthenticateController@authenticate');
    
    
    /*------Rutas de Clientes ------------*/
    Route::get('index', 'ClientsController@indexList');
    Route::post('insert', 'ClientsController@insertClients');
    Route::post('list', 'ClientsController@getClientsList');
    Route::post('update', 'ClientsController@update');
    
    
});
