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

	// ------- ATTRIBUTE ITEMS ---------- //
	Route::get('attributesItems', array(
		'as' 		=> 'attributesItems',
		'uses' 		=> 'SmallTimeShop\Controllers\AttributesItemsController@getIndex'
		));

	Route::get('attributesItems/create', array(
		'as' 		=> 'attributesItems.create',
		'uses' 		=> 'SmallTimeShop\Controllers\AttributesItemsController@getCreate'
		));

	Route::post('attributesItems/store', array(
		'as' 		=> 'attributesItems.store',
		'uses' 		=> 'SmallTimeShop\Controllers\AttributesItemsController@postStore'
		));

	Route::get('attributesItems/edit/{id}', array(
		'as' 		=> 'attributesItems.edit',
		'uses' 		=> 'SmallTimeShop\Controllers\AttributesItemsController@getEdit'
		));

	Route::post('attributesItems/update/{id}', array(
		'as' 		=> 'attributesItems.update',
		'uses' 		=> 'SmallTimeShop\Controllers\AttributesItemsController@postUpdate'
		));

	Route::get('attributesItems/delete/{id}', array(
		'as' 		=> 'attributesItems.delete',
		'uses' 		=> 'SmallTimeShop\Controllers\AttributesItemsController@getDelete'
		));

	// ------- ATTRIBUTES ---------- //
	Route::get('attributes', array(
		'as' 		=> 'attributes',
		'uses' 		=> 'SmallTimeShop\Controllers\AttributesController@getIndex'
		));

	Route::get('attributes/create', array(
		'as' 		=> 'attributes.create',
		'uses' 		=> 'SmallTimeShop\Controllers\AttributesController@getCreate'
		));

	Route::post('attributes/store', array(
		'as' 		=> 'attributes.store',
		'uses' 		=> 'SmallTimeShop\Controllers\AttributesController@postStore'
		));

	Route::get('attributes/edit/{id}', array(
		'as' 		=> 'attributes.edit',
		'uses' 		=> 'SmallTimeShop\Controllers\AttributesController@getEdit'
		));

	Route::post('attributes/update/{id}', array(
		'as' 		=> 'attributes.update',
		'uses' 		=> 'SmallTimeShop\Controllers\AttributesController@postUpdate'
		));

	Route::get('attributes/delete/{id}', array(
		'as' 		=> 'attributes.delete',
		'uses' 		=> 'SmallTimeShop\Controllers\AttributesController@getDelete'
		));

	// ------- USERS ---------- //
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

