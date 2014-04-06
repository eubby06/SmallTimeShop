<?php namespace SmallTimeShop\Providers;

use Illuminate\Support\ServiceProvider;
use SmallTimeShop\Repositories as Repository;
use SmallTimeShop\Services\ImageUploader\ImageUploader;

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

		$this->app->bind(
			'SmallTimeShop\Repositories\PageRepositoryInterface', 
			'SmallTimeShop\Repositories\PageRepository');

		$this->app->bind(
			'SmallTimeShop\Repositories\UserRepositoryInterface', 
			'SmallTimeShop\Repositories\UserRepository');

		$this->app->bind(
			'SmallTimeShop\Repositories\GroupRepositoryInterface', 
			'SmallTimeShop\Repositories\GroupRepository');

		$this->app->bind(
			'SmallTimeShop\Repositories\AttributeRepositoryInterface', 
			'SmallTimeShop\Repositories\AttributeRepository');

		$this->app->bind(
			'SmallTimeShop\Repositories\AttributeItemRepositoryInterface', 
			'SmallTimeShop\Repositories\AttributeItemRepository');

		$this->app->bind('ImageUploader', function()
		{
			return new ImageUPloader();
		});

	}
}