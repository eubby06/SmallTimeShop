<?php namespace SmallTimeShop\Repositories;

use SmallTimeShop\Services\AccessControlService\User\ACLUser;

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
		
		$user = $this->user->create($data);

		if ( $user )
		{
			return true;
		}

		return false;
	}
}