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
	
	Auth::routes();
	
	Route::get('/home', 'HomeController@index');
	
	Route::get('/', 'CategoryController@index');
	
	Route::get('category/{category_id}', 'CategoryController@show');
	
	Route::post('product/{product_id}', 'ProductController@comment');
	
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
	
	Route::post('/admin/productOperation/search', 'SearchAdminController@search');
	
	Route::post('/cart/add', array(
			'uses'   => 'CartController@addCart',
			'as'     => 'cart.add'
	));
	
/* 	Route::get('/', 'CartController@cartInfo'); */
	
	Route::get('/cart', 'CartController@showCart');
	
	Route::get('/cart/delete/{cart_id}', array(
			'uses'   => 'CartController@deleteCart',
			'as'     => 'cart.delete'
	));
	
	Route::get('/order', 'OrderController@index');
	
	Route::post('/order', 'OrderController@postOrder');
	
	Route::get('/history', 'OrderController@showHistory');
		//Admin Login
	Route::get('admin/login', 'AdminAuth\LoginController@showLoginForm');
	Route::post('admin/login', 'AdminAuth\LoginController@login');
	Route::post('admin/logout', 'AdminAuth\LoginController@logout');
	
	//Admin Register
	Route::get('admin/register', 'AdminAuth\RegisterController@showRegistrationForm');
	Route::post('admin/register', 'AdminAuth\RegisterController@register');
	
	//Admin Passwords
	Route::post('admin/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
	Route::post('admin/password/reset', 'AdminAuth\ResetPasswordController@reset');
	Route::get('admin/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
	Route::get('admin/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
	
	Route::group(['middleware' => ['web']], function() {
		Route::resource('admin/productOperation', 'ProductOperationController');
	});