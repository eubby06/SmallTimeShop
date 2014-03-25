<?php namespace SmallTimeShop\Providers;

use Illuminate\Support\ServiceProvider;
use SmallTimeShop\Repositories as Repository;

class AppServiceProvider extends ServiceProvider
{

	public function register()
	{
		
		$this->app->bind(
			'SmallTimeShop\Repositories\ProductRepositoryInterface', 
			'SmallTimeShop\Repositories\ProductRepository');

		$this->app->bind(
			'SmallTimeShop\Repositories\CategoryRepositoryInterface', 
			'SmallTimeShop\Repositories\CategoryRepository');

	}
}