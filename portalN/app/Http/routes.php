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

Route::get('/', 'IndexController@login');
Route::get('/Juego1', 'IndexController@juego1');
Route::get('/Juego2', 'IndexController@juego2');
Route::resource('index','IndexController');
