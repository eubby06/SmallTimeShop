<?php namespace SmallTimeShop\Services\AccessControlService;

use SmallTimeShop\Services\AccessControlService as Provider;
use SmallTimeShop\Services\AccessControlService\User\ACLUser;
use SmallTimeShop\Services\Validators as Validator;
use Exception, Session, Cookie, Hash, Redirect;

class AccessControl
{

	protected $userProvider;
	protected $groupProvider;
	protected $permissionProvider;
	protected $userValidator;

	protected $currentUser = null;
	protected $loggedIn = false;
	protected $cookie = null;
	protected $errors = null;

	public function __construct(
		Provider\User\ACLUserProviderInterface $userProvider, 
		Provider\Group\ACLGroupProviderInterface $groupProvider, 
		Provider\Permission\ACLPermissionProviderInterface $permissionProvider,
		Validator\UserValidator $validator)
	{
		$this->userProvider 		= $userProvider;
		$this->groupProvider 		= $groupProvider;
		$this->permissionProvider 	= $permissionProvider;
		$this->userValidator 		= $validator;
	}

	public function getUserProvider()
	{
		return $this->userProvider;
	}

	public function getGroupProvider()
	{
		return $this->groupProvider;
	}

	public function getPermissionProvider()
	{
		return $this->permissionProvider;
	}

	public function check()
	{
		if ( $this->isGuest() )
		{
			$userInCookie = Cookie::get('user') ? true : false;

			if ($userInCookie) 
			{
				$user = $this->userProvider->findByUsernameAndToken($userInCookie);

				if ($user instanceOf ACLUser) 
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

		$authenticatedUser = $this->userProvider->findByCredentials($credentials);

		if ($authenticatedUser instanceOf ACLUser)
		{
			$this->login($authenticatedUser, $remember);
			
			return true;
		}
		
		return false;
	}

	//to be protected later
	public function login(ACLUser $user, $remember)
	{
		$this->currentUser = $user;

		$user->token = $user->generateToken();
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

	public function isGuest()
	{
		return $this->currentUser() ? false : true;
	}

	public function isLoggedIn()
	{
		return $this->currentUser() ? true : false;
	}

	public function currentUser()
	{
		if ( is_null($this->currentUser) )
		{
			$userInSession = Session::get('user') ? Session::get('user') : false;

			if ($userInSession) 
			{
				$user = $this->userProvider->findByUsernameAndToken($userInSession);

				if ($user instanceOf ACLUser) 
				{
					$this->currentUser = $user;
				}
			}		
		}

		return $this->currentUser;
	}

	public function register(array $attributes)
	{

		if ($this->userValidator->with($attributes)->passes())
		{
			$model = $this->userProvider->model();
			$result = $model->create($attributes);

			return $result;
		}

		$this->errors = $this->userValidator->errors;
		return false;
	}

	public function errors()
	{
		return $this->errors;
	}
}