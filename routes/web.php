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

Route::get('/', 'GurlmapController@showGurl');

Route::post('/urlmapping', 'GurlmapController@addUrl');

Route::delete('/urlmapping/{urlmapping}', 'GurlmapController@delUrl');

Route::get('/urlinfo/{id}', 'GurlmapController@displayInfo');


Route::get('/home', 'HomeController@index');

Route::get('/{id}', 'UrlredirController@redirUrl');

