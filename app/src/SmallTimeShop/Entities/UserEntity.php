<?php namespace SmallTimeShop\Entities;

use SmallTimeShop\Repositories as Repository;
use SmallTimeShop\Services\Validators\UserValidator;

class UserEntity extends AbstractEntity
{

	protected $repository;

	protected $validator;

	protected $errors;

	public function __construct(
		Repository\UserRepositoryInterface $userRepository,
		UserValidator $userValidator)
	{
		$this->repository = $userRepository;
		$this->validator = $userValidator;
	}

}