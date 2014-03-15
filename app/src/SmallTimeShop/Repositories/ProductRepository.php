<?php namespace SmallTimeShop\Repositories;

use SmallTimeShop\Models\ProductModel as Product;

class ProductRepository implements ProductRepositoryInterface
{

	public function all()
	{

	}
	
	public function find($id)
	{
		return Product::find($id)->findOrFail($id);
	}

	public function getCurrent()
	{
		return 'current';
	}
}