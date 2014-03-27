<?php namespace SmallTimeShop\Repositories;

use SmallTimeShop\Models\PageModel as Page;

class PageRepository implements PageRepositoryInterface
{

	public function all()
	{
		return Page::all();
	}
	
	public function find($id)
	{
		return Page::find($id)->findOrFail($id);
	}

	public function create(array $data)
	{
		return Page::create($data);
	}

	public function delete($id)
	{
		$user = Page::find($id);

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