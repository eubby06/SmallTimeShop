<?php namespace SmallTimeShop\Repositories;

use SmallTimeShop\Services\AccessControlService\User\ACLUser;
use Hash;

class UserRepository implements UserRepositoryInterface
{
	protected $user;

	public function __construct(ACLUser $user)
	{
		$this->user = $user;
	}

	public function all()
	{
		return $this->user->all();
	}
	
	public function find($id)
	{
		return $this->user->find($id)->findOrFail($id);
	}

	public function delete($id)
	{
		$user = $this->user->find($id);

		if ($user)
		{
			return $user->delete();
		}

		return false;
	}

	public function update($id = null, $data)
	{
		$user = $this->user->find($id);

		if ($user)
		{
			return $user->update($data);
		}

		return false;
	}

	public function create(array $data)
	{
		$groups = $data['groups'];

		unset($data['groups']);
		unset($data['password_confirmation']);

		$data['password'] = Hash::make($data['password']);

		$user = $this->user->create($data);

		if ($user)
		{
			foreach ($groups as $group)
			{
				$user->groups()->attach($group);
			}

			return true;
		}

		return false;
	}
}