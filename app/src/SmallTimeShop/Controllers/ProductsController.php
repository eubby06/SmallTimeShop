<?php namespace SmallTimeShop\Controllers;

use SmallTimeShop\Repositories as Repositories;
use Event, ACL, Response, Cookie, View;

class ProductsController extends BaseController
{
	protected $layout = 'backend.layouts.default';

	public function getIndex()
	{
		$current = ACL::currentUser();
		
		$this->layout->content = View::make('backend.products.index');

		return $this->layout;
	}
}