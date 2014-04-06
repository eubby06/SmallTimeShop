<?php namespace SmallTimeShop\Repositories;

use SmallTimeShop\Models\AttributeModel as Attribute;

class AttributeRepository implements AttributeRepositoryInterface
{

	public function all()
	{
		return Attribute::all();
	}
	
	public function find($id)
	{
		return Attribute::find($id)->findOrFail($id);
	}

	public function create(array $data)
	{
		return Attribute::create($data);
	}

	public function delete($id)
	{
		$user = Attribute::find($id);

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