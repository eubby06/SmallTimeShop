<?php namespace SmallTimeShop\Controllers;

use SmallTimeShop\Repositories as Repositories;
use Event, ACL, Response, Cookie;

class ProductsController extends BaseController
{

	protected $productRepository;

	public function __construct(Repositories\ProductRepositoryInterface $productRepository)
	{
		$this->productRepository = $productRepository;
	}

	public function getIndex()
	{
		$sessionCredentials = array(
			'username' => 'admin',
			'token' 	=> 'tokencode'
			);

		$response = Response::make('Hello World');
		return $response->withCookie(Cookie::forget('current'));
	}

	public function getTry()
	{
		dd(Cookie::get('current'));
	}
}