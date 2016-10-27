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



Route::get('/', 'IndexController@index');
Route::resource('index','IndexController');
Route::get('/administrar', 'IndexController@administrar');
Route::get('/juegos', 'IndexController@juegos');
Route::resource('agregar','AddController');

