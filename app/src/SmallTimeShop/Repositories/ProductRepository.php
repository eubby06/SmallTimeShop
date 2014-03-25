<?php namespace SmallTimeShop\Repositories;

use SmallTimeShop\Models\ProductModel;

class ProductRepository implements ProductRepositoryInterface
{
	protected $product;

	public function __construct(ProductModel $product)
	{
		$this->product = $product;
	}

	public function all()
	{
		return $this->product->all();
	}
	
	public function find($id)
	{
		return $this->product->find($id)->findOrFail($id);
	}

	public function delete($id)
	{
		$user = $this->product->find($id);

		if ($user)
		{
			return $user->delete();
		}

		return false;
	}

	public function update($id = null, $data)
	{
		if (is_null($id) )
		{
			foreach ($data as $item)
			{
				$obj = $this->find($item['id']);

				if ($obj)
				{
					unset($item['id']);
					return $obj->update($item);
				}
			}
		}

		$obj = $this->find($id);

		$categories = $data['categories'];
		unset($data['categories']);
		unset($data['id']);

		if ($obj)
		{

			$obj->categories()->sync($categories);

			return $obj->update($data);
		}

		return false;
	}

	public function create(array $data)
	{
		$categories = $data['categories'];

		unset($data['categories']);
		
		$product = $this->product->create($data);

		if ( ! empty($data) )
		{
			foreach ($categories as $category)
			{
				$product->categories()->attach($category);
			}

			return true;
		}

		return false;
	}
}