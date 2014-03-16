<?php namespace SmallTimeShop\Services\AccessControlService;

interface AccessControlInterface
{

	public function authenticate($credentials = array(), $remember = false);

	public function logout();

	public function hasPermission();

	public function Permissions();

	public function canDelete();

	public function canAdd();

	public function canView();

	public function isAdmin();

	public function isGuest();

	public function isLoggedIn();

}