<?php namespace SmallTimeShop\Providers;

use Illuminate\Support\ServiceProvider;
use SmallTimeShop\Services\AccessControlService\AccessControl;
use SmallTimeShop\Repositories\UserRepository;

class AppServiceProvider extends ServiceProvider
{

	public function register()
	{
		$this->app->bind(
			'SmallTimeShop\Repositories\ProductRepositoryInterface', 
			'SmallTimeShop\Repositories\ProductRepository');
	
		$this->app->singleton('ACL', function()
		{
			$user = new UserRepository();
			return new AccessControl($user);
		});
	}
}