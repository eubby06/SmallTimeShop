<?php namespace SmallTimeShop\Services\AccessControlService;

use Illuminate\Support\ServiceProvider;
use SmallTimeShop\Services\AccessControlService\AccessControl;
use SmallTimeShop\Services\AccessControlService as ACLProvider;

class ACLServiceProvider extends ServiceProvider
{

	public function register()
	{
		$this->app->bind(
			'SmallTimeShop\Services\AccessControlService\User\ACLUserProviderInterface', 
			'SmallTimeShop\Services\AccessControlService\User\ACLUserProvider');

		$this->app->bind(
			'SmallTimeShop\Services\AccessControlService\Group\ACLGroupProviderInterface', 
			'SmallTimeShop\Services\AccessControlService\Group\ACLGroupProvider');

		$this->app->bind(
			'SmallTimeShop\Services\AccessControlService\Permission\ACLPermissionProviderInterface', 
			'SmallTimeShop\Services\AccessControlService\Permission\ACLPermissionProvider');

		$this->app->singleton('ACL', function()
		{
			$user 		= new ACLProvider\User\ACLUserProvider();
			$group 		= new ACLProvider\Group\ACLGroupProvider();
			$permission = new ACLProvider\Permission\ACLPermissionProvider();

			return new AccessControl($user, $group, $permission);
		});
	}
}