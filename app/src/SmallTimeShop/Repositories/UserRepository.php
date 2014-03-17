<?php namespace SmallTimeShop\Repositories;

use SmallTimeShop\Models\UserModel as User;
use SmallTimeShop\Services\AccessControlService\ACLUserInterface;
use Hash;

class UserRepository implements UserRepositoryInterface, ACLUserInterface
{
	public function find($id)
	{
		return User::find($id);
	}

	public function findByCredentials($credentials)
	{
		$user = User::where('username', '=', $credentials['username'])->first();

		if ($user && Hash::check($credentials['password'], $user->password))
		{
			return $user;
		}

		return null;
	}

	public function findByUsernameAndToken($credentials)
	{

		$user = User::where('username', '=', $credentials['username'])
		->where('token', '=', $credentials['token'])->first();

		return $user;	
	}
}