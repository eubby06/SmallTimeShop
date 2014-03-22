<?php namespace SmallTimeShop\Controllers;

use SmallTimeShop\Repositories as Repositories;
use SmallTimeShop\Services\Validators\ProductValidator;
use Event, ACL, Response, Cookie, View, Input, Redirect;

class ProductsController extends BaseController
{
	protected $layout = 'backend.layouts.default';
	protected $productRepository;

	public function __construct(Repositories\ProductRepositoryInterface $productRepo)
	{
		$this->productRepository = $productRepo;
	}

	public function getIndex()
	{		
		$products = $this->productRepository->all();

		$this->layout->content = View::make('backend.products.index')
										->with('products', $products);

		return $this->layout;
	}

	public function getCreate()
	{		

		$this->layout->content = View::make('backend.products.create');

		return $this->layout;
	}

	public function postStore()
	{
		$attributes = Input::all();
		$validator = new ProductValidator($attributes);

		if ( $validator->passes() )
		{
			return 'pass';
		}

		return Redirect::route('products.create')->withErrors($validator->errors())->withInput();
	}
}