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
	
    Route::get('category/{category_id}/lowest', [
        'uses' => '\App\Http\Controllers\CategoryController@orderByLowest',
        'as'   => 'category.lowest',
    ]);
	
	Route::get('category/{category_id}/highest', [
     	'uses' => '\App\Http\Controllers\CategoryController@orderByHighest',
        'as'   => 'category.highest',
    ]);
	    
	Route::post('/search', [
	    'uses' => '\App\Http\Controllers\SearchController@search',
	    'as'   => 'queries.search',
	]);
	
	Route::post('/cart/add', array(
			'uses'   => 'CartController@addCart',
			'as'     => 'cart.add'
	));
	
	Route::get('/cart', 'CartController@showCart');
	
	Route::get('/cart/delete/{cart_id}', array(
			'uses'   => 'CartController@deleteCart',
			'as'     => 'cart.delete'
	));
