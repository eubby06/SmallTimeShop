<?php namespace SmallTimeShop\Services\AccessControlService;

interface AccessControlInterface
{
	public function authenticate($credentials, $remember = false);
}