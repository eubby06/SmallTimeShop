<?php

class AccessControlTest extends TestCase
{

	public function testACLInContainerMustBeAnInstanceOfAccessControl()
	{
		$acl = App::make('ACL');

		$this->assertInstanceOf('SmallTimeShop\Services\AccessControlService\AccessControl', $acl, 'Must be an instance of AccessControl');
	}

	public function testUserRepoIsSetAndMustBeInstanceOfUserModel()
	{
		$this->assertInstanceOf('SmallTimeShop\Services\AccessControlService\User\ACLUserProviderInterface', ACL::getUserProvider()); 
	}

	public function testGroupRepoIsSetAndMustBeInstanceOfGroupModel()
	{
		$this->assertInstanceOf('SmallTimeShop\Services\AccessControlService\Group\ACLGroupProviderInterface', ACL::getGroupProvider());
	}

	public function testPermissionRepoIsSetAndMustBeInstanceOfGroupModel()
	{
		$this->assertInstanceOf('SmallTimeShop\Services\AccessControlService\Permission\ACLPermissionProviderInterface', ACL::getPermissionProvider());
	}

	public function testCheckMethodShouldReturnFalseWhenCookieUserIsNotSet()
	{
		Cookie::shouldReceive('get')->once()->with('user')->andReturn(false);

		$this->assertFalse(ACL::check());
	}

	public function testWhenLoginSessionShouldReceivePut()
	{
		$user = Mockery::mock('SmallTimeShop\Services\AccessControlService\User\ACLUser');
		$user->shouldReceive('setAttribute')->once();
		$user->shouldReceive('getAttribute')->once();
		$user->shouldReceive('generateToken')->once();
		$user->shouldReceive('save')->once();

		Session::shouldReceive('get')->once()->andReturn(false);
		Session::shouldReceive('put')->once();

		ACL::login($user, false);
	}

	public function testWhenLoginWithRememberCookieShouldReceiveQueue()
	{
		$user = Mockery::mock('SmallTimeShop\Services\AccessControlService\User\ACLUser');
		$user->shouldReceive('setAttribute')->once();
		$user->shouldReceive('getAttribute')->once();
		$user->shouldReceive('generateToken')->once();
		$user->shouldReceive('save')->once();

		Session::shouldReceive('get')->once()->andReturn(false);
		Session::shouldReceive('put')->once();

		Cookie::shouldReceive('forever')->once();
		Cookie::shouldReceive('queue')->once();

		ACL::login($user, true);
	}

	public function testWhenLogOutSessionAndCookieShouldReceiveForgetMethod()
	{
		Session::shouldReceive('get')->once()->with('user')->andReturn(true);
		Session::shouldReceive('forget')->with('user')->once();

		Cookie::shouldReceive('get')->once()->with('user')->andReturn(true);
		Cookie::shouldReceive('forget')->once()->with('user');

		ACL::logout();
	}
}