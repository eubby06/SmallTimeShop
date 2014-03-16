<?php namespace SmallTimeShop\Repositories;


interface UserRepositoryInterface
{
	public function find($id);

	public function findByCredentials($credentials);
}