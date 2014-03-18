<?php namespace SmallTimeShop\Services\AccessControlService\Permission;

use SmallTimeShop\Services\AccessControlService\Permission\ACLPermission as Permission;

class ACLPermissionProvider implements ACLPermissionProviderInterface
{

	public function findById($id)
	{
		return Permission::find($id);
	}

}