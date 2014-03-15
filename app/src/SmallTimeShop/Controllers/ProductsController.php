<?php namespace SmallTimeShop\Controllers;

use SmallTimeShop\Repositories as Repositories;
use Event, ACL;

class ProductsController extends BaseController
{

	protected $productRepository;

	public function __construct(Repositories\ProductRepositoryInterface $productRepository)
	{
		$this->productRepository = $productRepository;
	}

	public function getIndex()
	{
		dd(ACL::authenticate('admin', false));
	}
}