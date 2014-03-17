<?php namespace SmallTimeShop\Controllers;

use SmallTimeShop\Repositories as Repositories;
use Event, ACL, Response, Cookie;

class DashboardController extends BaseController
{

	public function getIndex()
	{
		$current = ACL::currentUser();

		if ( ACL::isAdmin() )
		{
			return 'yes';
		}

		return 'nope';
		
		//return '<a href="logout">Logout</a> welcome to dashboard';
	}
}