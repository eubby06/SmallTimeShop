<?php namespace SmallTimeShop\Controllers;

use SmallTimeShop\Entities as Entity;
use Event, ACL, Response, Cookie, View, Input, Redirect;

class ProductsController extends BaseController
{
	protected $layout = 'backend.layouts.default';
	protected $productEntity;

	public function __construct(Entity\ProductEntity $productEntity)
	{
		$this->productEntity = $productEntity;
	}

	public function getIndex()
	{		
		$products = $this->productEntity->all();

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

		$created = $this->productEntity->create($attributes);

		if ( $created )
		{
			return Redirect::route('products')->with('success', 'New product has been created.');
		}

		return Redirect::route('products.create')->withErrors($this->productEntity->errors())->withInput();
	}
}