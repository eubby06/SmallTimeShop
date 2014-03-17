<?php namespace SmallTimeShop\Repositories;

use SmallTimeShop\Models\GroupModel as Group;
use SmallTimeShop\Services\AccessControlService\ACLGroupInterface;

class GroupRepository implements GroupRepositoryInterface, ACLGroupInterface
{
	public function find($id)
	{
		return 'group from repo';
	}
}