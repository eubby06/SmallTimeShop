<?php namespace SmallTimeShop\Services\AccessControlService\User;

use Illuminate\Database\Eloquent\Model;

class ACLUser extends Model implements ACLUserInterface
{
	protected $table = "users";

	protected $groupPermissions = array();

	protected $userGroups = array();

	//DEFINE RELATIONSHIPS
	public function groups()
    {
        return $this->belongsToMany('SmallTimeShop\Services\AccessControlService\Group\ACLGroup', 
        	'group_user', 'user_id', 'group_id');
    }

    //INTERFACE METHODS
	public function getGroups()
	{
		return $this->groups;
	}

	public function isAdmin()
	{
		$this->loadGroupsAndPermissions();

		if (array_key_exists('admin', $this->userGroups))
		{
			return true;
		}

		return false;
	}

	protected function loadGroupsAndPermissions()
	{
		$groups 		= array();
		$permissions 	= array();

		$callBack = function($groupPermissions) {

			$permissions = array();

			foreach($groupPermissions as $permission)
			{
				$permissions[$permission->resource][] = array(
				'action' 	=> $permission->action,
				'value' 	=> $permission->value
				);			
			}

			return $permissions;
		};

		foreach($this->groups as $group)
		{
			$groups[] = $group;
			$userGroups[$group->id] = $group->name;

			if ( $group->permissions->count() )
			{
				$permissions[] = $callBack($group->permissions);
			}
		}

		$this->userGroups = array_flip($userGroups);
		$this->groupPermission = array_shift($permissions);
	}

	public function hasPermission($resource = null, $action = null)
	{
		$this->loadGroupsAndPermissions();

		$allowedActions = $this->groupPermission[$resource];

		$callBack = function($actions, $searchedAction)
		{
			$found = false;

			foreach($actions as $action)
			{
				if ($action['action'] == $searchedAction) 
				{
					$found = true;
					break;
				}
			}

			return $found;
		};

		return $callBack($allowedActions, $action);
	}

	public function generateToken($length = 42)
	{

		if (function_exists('openssl_random_pseudo_bytes'))
		{
			$bytes = openssl_random_pseudo_bytes($length * 2);

			if ($bytes === false)
			{
				throw new \RuntimeException('Unable to generate random string.');
			}

			return substr(str_replace(array('/', '+', '='), '', base64_encode($bytes)), 0, $length);
		}

		$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

		return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
	}

	public function model()
	{
		return self;
	}
}