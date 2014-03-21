<?php namespace SmallTimeShop\Controllers;

use SmallTimeShop\Repositories as Repositories;
use Event, ACL, Response, Cookie, View;

class DashboardController extends BaseController
{
	protected $layout = 'backend.layouts.default';

	public function getIndex()
	{
		$current = ACL::currentUser();
		
		$this->layout->content = View::make('backend.dashboard');

		return $this->layout;
	}
}