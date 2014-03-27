<?php namespace SmallTimeShop\Repositories;

use SmallTimeShop\Services\AccessControlService\Group\ACLGroup;

class GroupRepository implements GroupRepositoryInterface
{
	protected $group;

	public function __construct(ACLGroup $group)
	{
		$this->group = $group;
	}

	public function all()
	{
		return $this->group->all();
	}
	
	public function find($id)
	{
		return $this->group->find($id)->findOrFail($id);
	}

	public function delete($id)
	{
		$group = $this->group->find($id);

		if ($group)
		{
			return $group->delete();
		}

		return false;
	}

	public function update($id = null, $data)
	{
		$group = $this->group->find($id);

		if ($group)
		{
			return $group->update($data);
		}

		return false;
	}

	public function create(array $data)
	{
		
		$group = $this->group->create($data);

		if ( $group )
		{
			return true;
		}

		return false;
	}
}