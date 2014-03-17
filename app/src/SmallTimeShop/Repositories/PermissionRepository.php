<?php namespace SmallTimeShop\Repositories;

use SmallTimeShop\Models\PermissionModel as Permission;
use SmallTimeShop\Services\AccessControlService\ACLPermissionInterface;

class PermissionRepository implements GroupRepositoryInterface, ACLPermissionInterface
{
	public function find($id)
	{
		return 'permission from repo';
	}
}