<?php namespace SmallTimeShop\Services\AccessControlService;

use SmallTimeShop\Models\UserModel;
use Exception, Session, Cookie, Hash, Redirect;

class AccessControl implements AccessControlInterface
{

	protected $userRepo;
	protected $groupRepo;
	protected $permissionRepo;

	protected $currentUser = null;
	protected $loggedIn = false;
	protected $cookie = null;

	public function __construct(
		ACLUserInterface $userRepo, 
		ACLGroupInterface $groupRepo, 
		ACLPermissionInterface $permissionRepo)
	{
		$this->userRepo 		= $userRepo;
		$this->groupRepo 		= $groupRepo;
		$this->permissionRepo 	= $permissionRepo;
	}

	public function userRepo()
	{
		return $this->userRepo;
	}

	public function groupRepo()
	{
		return $this->groupRepo;
	}

	public function permissionRepo()
	{
		return $this->permissionRepo;
	}

	public function check()
	{
		if ( $this->isGuest() )
		{
			$userInCookie = Cookie::get('user') ? true : false;

			if ($userInCookie) 
			{
				$user = $this->userRepo->findByUsernameAndToken($userInCookie);

				if ($user instanceOf UserModel) 
				{
					$this->login($user, true);
					return true;
				}
			}
			
			return false;	
		}

		return true;
	}

	public function authenticate($credentials = array(), $remember = false, $redirect = 'dashboard')
	{
		if (empty($credentials['username']) || empty($credentials['password']) )
		{
			return false;
		}

		$authenticatedUser = $this->userRepo->findByCredentials($credentials);

		if ($authenticatedUser instanceOf UserModel)
		{
			$this->login($authenticatedUser, $remember);
			
			return true;
		}
		
		return false;
	}

	//to be protected later
	public function login(UserModel $user, $remember)
	{
		$this->currentUser = $user;

		$user->token = $this->generateToken();
		$user->save();

		$userInCookie = array('username' => $user->username, 'token' => $user->token);

		if (Session::get('user')) 
		{
			Session::forget('user');
		}

		Session::put('user', $userInCookie);

		if ($remember) 
		{
			$cookie = Cookie::forever('user', $userInCookie);
			Cookie::queue($cookie);
		}
		
		return true;
	}

	public function logout($redirect = false)
	{
		if ($this->isLoggedIn())
		{
			$this->loggedIn = false;
		}

		if (Session::get('user')) 
		{
			Session::forget('user');
		}

		if (Cookie::get('user'))
		{
			$forgetCookie = Cookie::forget('user');
			Cookie::queue($forgetCookie);
		}

		if ($redirect)
		{
			return Redirect::route($redirect);
		}
		
		return true;
	}

	public function hasPermission(){}

	public function Permissions(){}

	public function canDelete(){}

	public function canAdd(){}

	public function canView(){}

	public function isAdmin()
	{
		$groups = array();

		$user = $this->currentUser();

		foreach($user->groups as $group)
		{
				$groups[] = $group->name;
		}

		$groups = array_flip($groups);

		if(array_key_exists('admin', $groups))
		{
			return true;
		}

		return false;
	}

	public function isGuest()
	{
		return $this->currentUser() ? false : true;
	}

	public function isLoggedIn()
	{
		return $this->currentUser() ? true : false;
	}

	//to be protected later
	public function generateToken()
	{
		return 'tokencode';
	}

	public function currentUser()
	{
		if ( is_null($this->currentUser) )
		{
			$userInSession = Session::get('user') ? Session::get('user') : false;

			if ($userInSession) 
			{
				$user = $this->userRepo->findByUsernameAndToken($userInSession);

				if ($user instanceOf UserModel) 
				{
					$this->currentUser = $user;
				}
			}		
		}

		return $this->currentUser;
	}
}