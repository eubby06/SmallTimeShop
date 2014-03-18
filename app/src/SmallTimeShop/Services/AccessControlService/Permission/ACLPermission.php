<?php namespace SmallTimeShop\Services\AccessControlService\Permission;

use Illuminate\Database\Eloquent\Model;

class ACLPermission extends Model implements ACLPermissionInterface
{
	protected $table = "permissions";

	public $timestamps = false;

}