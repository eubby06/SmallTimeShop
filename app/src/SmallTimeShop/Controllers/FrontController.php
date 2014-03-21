<?php namespace SmallTimeShop\Controllers;

use ACL;

class FrontController extends BaseController
{

	public function getIndex()
	{
		$current = ACL::currentUser();
		
		return 'WELCOME TO HOMEPAGE';
	}
}