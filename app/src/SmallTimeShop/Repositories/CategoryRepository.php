<?php namespace SmallTimeShop\Repositories;

use SmallTimeShop\Models\CategoryModel as Category;

class CategoryRepository implements CategoryRepositoryInterface
{

	public function all()
	{
		return Category::all();
	}
	
	public function find($id)
	{
		return Category::find($id)->findOrFail($id);
	}

	public function create(array $data)
	{
		return Category::create($data);
	}

	public function delete($id)
	{
		$user = Category::find($id);

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
			unset($data['id']);
			return $obj->update($data);
		}

		return false;
	}
}