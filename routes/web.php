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

Route::get('/', 'ServersController@index');


Route::get('/server/{id}', 'ServersController@view');
Route::get('/admin', 'Controller@admin');
Auth::routes();

Route::get('/vote/{id}', 'ServersController@vote');

Route::resource('/admin/servers', 'AdminServersController');
Route::resource('/admin/comments', 'ServerCommentsController');
Route::resource('/admin/replies', 'CommentRepliesController');
