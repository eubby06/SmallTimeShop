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

		$this->app->bind('ImageUploader', function()
		{
			return new ImageUPloader();
		});

	}
}