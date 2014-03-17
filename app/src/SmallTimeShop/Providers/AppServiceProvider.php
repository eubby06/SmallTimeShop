<?php namespace SmallTimeShop\Providers;

use Illuminate\Support\ServiceProvider;
use SmallTimeShop\Services\AccessControlService as Service;
use SmallTimeShop\Repositories as Repository;

class AppServiceProvider extends ServiceProvider
{

	public function register()
	{
		$this->app->bind(
			'SmallTimeShop\Repositories\ProductRepositoryInterface', 
			'SmallTimeShop\Repositories\ProductRepository');
	
		$this->app->singleton('ACL', function()
		{
			$user = new Repository\UserRepository();
			$group = new Repository\GroupRepository();
			$permission = new Repository\PermissionRepository();

			return new Service\AccessControl($user, $group, $permission);
		});
	}
}