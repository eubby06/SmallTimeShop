<?php namespace SmallTimeShop\Repositories;

use SmallTimeShop\Models\UserModel as User;
use SmallTimeShop\Services\AccessControlService\ACLUserInterface;

class UserRepository implements UserRepositoryInterface, ACLUserInterface
{
	public function find($id)
	{
		return 'user from repo';
	}

	public function findByCredentials($credentials)
	{
		return 'user';
	}
}