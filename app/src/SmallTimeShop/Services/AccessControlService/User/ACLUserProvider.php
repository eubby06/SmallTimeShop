<?php namespace SmallTimeShop\Services\AccessControlService\User;

use SmallTimeShop\Services\AccessControlService\User\ACLUser as User;
use Hash;

class ACLUserProvider implements ACLUserProviderInterface
{
	public function findById($id)
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