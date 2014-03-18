<?php namespace SmallTimeShop\Services\AccessControlService\User;

interface ACLUserProviderInterface
{
	public function findById($id);

	public function findByCredentials($credentials);

	public function findByUsernameAndToken($credentials);

}