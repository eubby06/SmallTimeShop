<?php namespace SmallTimeShop\Services\AccessControlService\Group;

use SmallTimeShop\Services\AccessControlService\Group\ACLGroup as Group;

class ACLGroupProvider implements ACLGroupProviderInterface
{

	public function findById($id)
	{
		return Group::find($id);
	}

	public function findByName($name)
	{
		return Group::where('name','=',$name)->first();
	}

}