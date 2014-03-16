<?php

use SmallTimeShop\Services\AccessControlService\AccessControl;
use SmallTimeShop\Repositories\UserRepository;
use SmallTimeShop\Models\UserModel;

class AccessControlTest extends TestCase
{

	public function testIsLoggedInMethodReturnsFalse()
	{
		$this->assertFalse(ACL::isLoggedIn());
	}

	public function testCheckMethodShouldReturnFalse()
	{
		$this->assertFalse(ACL::check());
	}

	public function testAuthenticateUser()
	{
		$credentials = array('username' => 'user', 'password' => 'admin');

		$userModel = Mockery::mock('UserModel');

		$user = Mockery::mock('UserRepository');

		Hash::shouldReceive('make')->once();
		
		//$user->shouldReceive('findByCredentials')->with($credentials)->andReturn($userModel);

		ACL::authenticate($credentials, false);
	}
}