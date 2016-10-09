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

	Route::get('/', function () {
		return view('index');
	});
	
	Route::get('/show', function () {
		return view('show');
	});
	
	Auth::routes();
	
	Route::get('/home', 'HomeController@index');
	
	Route::get('/', 'CategoryController@index');
	
	Route::get('category/{category_id}', 'CategoryController@show');
	
	Route::get('product/{product_id}', 'ProductController@show');
