<?php namespace SmallTimeShop\Services\AccessControlService;

use Illuminate\Support\ServiceProvider;
use SmallTimeShop\Services\AccessControlService\AccessControl;
use Config;

class ACLServiceProvider extends ServiceProvider
{

	public function register()
	{
		$this->app->bind(
			'SmallTimeShop\Services\AccessControlService\ACLUserInterface', 
			Config::get('acl.user'));
	}
}