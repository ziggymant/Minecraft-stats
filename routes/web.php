<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'Controller@welcome');


Route::get('/test', 'Controller@mc');
Route::get('/admin', 'Controller@admin');
Auth::routes();

Route::get('/home', 'HomeController@index');
