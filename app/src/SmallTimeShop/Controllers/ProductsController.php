<?php namespace SmallTimeShop\Controllers;

use SmallTimeShop\Entities as Entity;
use Event, ACL, Response, Cookie, View, Input, Redirect;

class ProductsController extends BaseController
{
	protected $layout = 'backend.layouts.default';
	protected $productEntity;
	protected $categoryEntity;

	public function __construct(
		Entity\ProductEntity $productEntity,
		Entity\CategoryEntity $categoryEntity)
	{
		$this->productEntity 	= $productEntity;
		$this->categoryEntity 	= $categoryEntity;
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
		$categories = $this->categoryEntity->forForm();

		$this->layout->content = View::make('backend.products.create')
									->with('categories', $categories);

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

	public function getEdit($id)
	{		
		$categories = $this->categoryEntity->forForm();
		$product = $this->productEntity->find($id);

		$this->layout->content = View::make('backend.products.edit')
									->with('product', $product)
									->with('categories', $categories);

		return $this->layout;
	}

	public function postUpdate($id)
	{

		$attributes = Input::all();

		$created = $this->productEntity->update($id, $attributes);

		if ( $created )
		{
			return Redirect::route('products')->with('success', 'Product has been updated.');
		}

		return Redirect::route('products.edit', $id)->withErrors($this->productEntity->errors());
	}

	public function getDelete($id)
	{		

		$product = $this->productEntity->delete($id);

		return Redirect::route('products')->with('success', 'Product has been deleted.');
	}
}