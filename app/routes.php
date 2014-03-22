<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::controller('products', 'SmallTimeShop\Controllers\ProductsController');

Route::group(array('prefix' => 'admin', 'before'	=> 'frisk.user'), function()
{

	Route::get('dashboard', array(
		'as' 		=> 'dashboard',
		'uses' 		=> 'SmallTimeShop\Controllers\DashboardController@getIndex'
		));

	Route::get('products', array(
		'as' 		=> 'products',
		'uses' 		=> 'SmallTimeShop\Controllers\ProductsController@getIndex'
		));

	Route::get('products/create', array(
		'as' 		=> 'products.create',
		'uses' 		=> 'SmallTimeShop\Controllers\ProductsController@getCreate'
		));

	Route::post('products/store', array(
		'as' 		=> 'products.store',
		'uses' 		=> 'SmallTimeShop\Controllers\ProductsController@postStore'
		));
});

Route::get('/', array(
	'as' 	=> 'front',
	'uses' 	=> 'SmallTimeShop\Controllers\FrontController@getIndex'
	));

Route::get('register', array(
	'as' 	=> 'get.register',
	'uses'	=> 'SmallTimeShop\Controllers\RegistrationController@getIndex'
	));

Route::post('register', array(
	'as' 	=> 'post.register',
	'uses'	=> 'SmallTimeShop\Controllers\RegistrationController@postIndex'
	));

Route::get('login', array(
	'as' 		=> 'get.login',
	'uses' 		=> 'SmallTimeShop\Controllers\LoginController@getIndex'
	));

Route::post('login', array(
	'as' 	=> 'post.login',
	'uses' 	=> 'SmallTimeShop\Controllers\LoginController@postIndex'
	));

Route::get('logout', array(
	'as' 	=> 'logout',
	'uses'	=> function() {
		return ACL::logout('get.login');
	}
	));

