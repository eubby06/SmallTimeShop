<?php namespace SmallTimeShop\Services\AccessControlService;

class AccessControl implements AccessControlInterface
{

	protected $user;
	protected $group;
	protected $permission;

	public function __construct(ACLUserInterface $user)
	{
		$this->user = $user;
	}

	public function authenticate($credentials, $remember = false)
	{
		return $this->user->find(1);
	}
}