<?php namespace SmallTimeShop\Services\AccessControlService\User;

interface ACLUserInterface
{
	public function getGroups();

	public function hasPermission();
	
	public function isAdmin();
	
	public function generateToken($length = 42);

	public function model();
}