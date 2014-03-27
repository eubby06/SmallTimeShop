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

	// ------- PAGES ---------- //
	Route::get('users', array(
		'as' 		=> 'users',
		'uses' 		=> 'SmallTimeShop\Controllers\UsersController@getIndex'
		));

	Route::get('users/create', array(
		'as' 		=> 'users.create',
		'uses' 		=> 'SmallTimeShop\Controllers\UsersController@getCreate'
		));

	Route::post('users/store', array(
		'as' 		=> 'users.store',
		'uses' 		=> 'SmallTimeShop\Controllers\UsersController@postStore'
		));

	Route::get('users/edit/{id}', array(
		'as' 		=> 'users.edit',
		'uses' 		=> 'SmallTimeShop\Controllers\UsersController@getEdit'
		));

	Route::post('users/update/{id}', array(
		'as' 		=> 'users.update',
		'uses' 		=> 'SmallTimeShop\Controllers\UsersController@postUpdate'
		));

	Route::get('users/delete/{id}', array(
		'as' 		=> 'users.delete',
		'uses' 		=> 'SmallTimeShop\Controllers\UsersController@getDelete'
		));

	// ------- PAGES ---------- //
	Route::get('pages', array(
		'as' 		=> 'pages',
		'uses' 		=> 'SmallTimeShop\Controllers\PagesController@getIndex'
		));

	Route::get('pages/create', array(
		'as' 		=> 'pages.create',
		'uses' 		=> 'SmallTimeShop\Controllers\PagesController@getCreate'
		));

	Route::post('pages/store', array(
		'as' 		=> 'pages.store',
		'uses' 		=> 'SmallTimeShop\Controllers\PagesController@postStore'
		));

	Route::get('pages/edit/{id}', array(
		'as' 		=> 'pages.edit',
		'uses' 		=> 'SmallTimeShop\Controllers\PagesController@getEdit'
		));

	Route::post('pages/update/{id}', array(
		'as' 		=> 'pages.update',
		'uses' 		=> 'SmallTimeShop\Controllers\PagesController@postUpdate'
		));

	Route::get('pages/delete/{id}', array(
		'as' 		=> 'pages.delete',
		'uses' 		=> 'SmallTimeShop\Controllers\PagesController@getDelete'
		));

	// ------- CATEGORIES ---------- //
	Route::get('categories', array(
		'as' 		=> 'categories',
		'uses' 		=> 'SmallTimeShop\Controllers\CategoriesController@getIndex'
		));

	Route::get('categories/create', array(
		'as' 		=> 'categories.create',
		'uses' 		=> 'SmallTimeShop\Controllers\CategoriesController@getCreate'
		));

	Route::post('categories/store', array(
		'as' 		=> 'categories.store',
		'uses' 		=> 'SmallTimeShop\Controllers\CategoriesController@postStore'
		));

	Route::get('categories/edit/{id}', array(
		'as' 		=> 'categories.edit',
		'uses' 		=> 'SmallTimeShop\Controllers\CategoriesController@getEdit'
		));

	Route::post('categories/update/{id}', array(
		'as' 		=> 'categories.update',
		'uses' 		=> 'SmallTimeShop\Controllers\CategoriesController@postUpdate'
		));

	Route::get('categories/delete/{id}', array(
		'as' 		=> 'categories.delete',
		'uses' 		=> 'SmallTimeShop\Controllers\CategoriesController@getDelete'
		));

	// ------- PRODUCTS ---------- //
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

	Route::get('products/edit/{id}', array(
		'as' 		=> 'products.edit',
		'uses' 		=> 'SmallTimeShop\Controllers\ProductsController@getEdit'
		));

	Route::post('products/update/{id}', array(
		'as' 		=> 'products.update',
		'uses' 		=> 'SmallTimeShop\Controllers\ProductsController@postUpdate'
		));

	Route::get('products/delete/{id}', array(
		'as' 		=> 'products.delete',
		'uses' 		=> 'SmallTimeShop\Controllers\ProductsController@getDelete'
		));

	Route::get('photos/{id}', array(
		'as' 		=> 'photos',
		'uses' 		=> 'SmallTimeShop\Controllers\PhotosController@getIndex'
		));

	Route::post('photos/upload/{id}', array(
		'as' 		=> 'photos.upload',
		'uses' 		=> 'SmallTimeShop\Controllers\PhotosController@postUpload'
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

