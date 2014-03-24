<?php namespace SmallTimeShop\Repositories;

use SmallTimeShop\Models\ProductModel as Product;

class ProductRepository implements ProductRepositoryInterface
{

	public function all()
	{
		return Product::all();
	}
	
	public function find($id)
	{
		return Product::find($id)->findOrFail($id);
	}

	public function create(array $data)
	{
		return Product::create($data);
	}

	public function delete($id)
	{
		$user = Product::find($id);

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
					return $obj->save($item);
				}
			}
		}

		$obj = $this->find($id);

		if ($obj)
		{
			unset($item['id']);
			return $obj->save($item);
		}

		return false;
	}
}