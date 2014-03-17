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

Route::get('dashboard', array(
	'before'	=> 'frisk.user',
	'as' 		=> 'dashboard',
	'uses' 		=> 'SmallTimeShop\Controllers\DashboardController@getIndex'
	));

Route::get('login', array(
	'as' 	=> 'get.login',
	'uses' 	=> 'SmallTimeShop\Controllers\LoginController@getIndex'
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