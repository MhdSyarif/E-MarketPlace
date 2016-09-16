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

// Route::get('/', function () {
//     return view('web/index');
// });

Route::get('/', 'FrontEndController@index');

Auth::routes();

//Back End
Route::get('/home', 'HomeController@index');
Route::post('/product/save', 'ProductController@store');
Route::get('/product/edit/{id}', 'ProductController@show');
Route::post('/product/update/{id}', 'ProductController@update');
Route::post('/product/upload/{id}', 'ProductController@upload');


//Front End
Route::get('/product/{id}', 'FrontEndController@view');