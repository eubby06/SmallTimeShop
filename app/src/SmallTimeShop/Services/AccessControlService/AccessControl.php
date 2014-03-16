<?php namespace SmallTimeShop\Services\AccessControlService;

use Exception, Session, Cookie, Hash;

class AccessControl implements AccessControlInterface
{

	protected $user;
	protected $group;
	protected $permission;

	protected $currentUser;
	protected $loggedIn = false;

	public function __construct(ACLUserInterface $user)
	{
		$this->user = $user;

		$this->check();
	}

	public function check()
	{
		if (Cookie::get('current'))
		{

			$user = $this->user->findByToken(Cookie::get('current'));

			if ($user) 
			{
				$this->login($user, $remember);
				return true;
			}
		}

		return false;
	}

	public function authenticate($credentials = array(), $remember = false)
	{
		if (!empty($credentials['username']) AND !empty($credentials['password']))
		{
			$credentials['password'] = Hash::make($credentials['password']);

			$user = $this->user->findByCredentials($credentials);

			if ($user) 
			{
				$this->login($user, $remember);
				return $user;
			}
		}

		return false;
	}

	protected function login($user, $remember)
	{
		$token = $this->generateToken();
		$this->currentUser = $user;

		$this->currentUser->loginToken = $token;
		$this->currentUser->save();

		$sessionCredentials = array(
			'username' => $this->currentUser->username,
			'token' 	=> $token
			);

		Session::put('current', $sessionCredentials);

		if ($remember)
		{
			Cookie::forever('current', $sessionCredentials);
		}

		$this->loggedIn = true;

	}

	public function logout()
	{
		$this->loggedIn = false;
		$this->currentUser = null;

		if (Session::forget('current'))
			Session::forget('current');

		if (Cookie::forget('current'))
			Cookie::forget('current');

		return true;
	}

	public function hasPermission(){}

	public function Permissions(){}

	public function canDelete(){}

	public function canAdd(){}

	public function canView(){}

	public function isAdmin(){}

	public function isGuest(){}

	public function isLoggedIn()
	{
		return $this->loggedIn;
	}

	protected function generateToken()
	{
		return 'tokencode';
	}
}