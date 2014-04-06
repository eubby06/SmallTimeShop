<?php namespace SmallTimeShop\Repositories;

use SmallTimeShop\Models\AttributeItemModel as AttributeItem;

class AttributeItemRepository implements AttributeItemRepositoryInterface
{

	public function all()
	{
		return AttributeItem::all();
	}
	
	public function find($id)
	{
		return AttributeItem::find($id)->findOrFail($id);
	}

	public function create(array $data)
	{
		return AttributeItem::create($data);
	}

	public function delete($id)
	{
		$user = AttributeItem::find($id);

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