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
Auth::routes();

Route::get('/', 'ServersController@index');
Route::get('/server/{id}', 'ServersController@view');
Route::get('/top', 'ServersController@top');


Route::group(['middleware'=>'auth'], function(){
  Route::get('/home', 'ServersController@index');
  Route::get('/vote/{id}', 'ServersController@vote');
  Route::resource('/admin/comments', 'ServerCommentsController');
  Route::resource('/admin/replies', 'CommentRepliesController');

});

Route::group(['middleware'=>'admin'], function(){

  Route::get('/admin', 'AdminServersController@admin');
  Route::resource('/admin/servers', 'AdminServersController');

});
