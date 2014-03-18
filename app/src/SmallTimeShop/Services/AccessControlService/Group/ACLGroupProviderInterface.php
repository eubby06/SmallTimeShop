<?php namespace SmallTimeShop\Services\AccessControlService\Group;

interface ACLGroupProviderInterface
{
	public function findById($id);

	public function findByName($name);

}