<?php namespace SmallTimeShop\Entities;

use SmallTimeShop\Repositories as Repository;
use SmallTimeShop\Services\Validators\PageValidator;

class PageEntity extends AbstractEntity
{

	protected $repository;

	protected $validator;

	protected $errors;

	public function __construct(
		Repository\PageRepositoryInterface $pageRepository,
		PageValidator $pageValidator)
	{
		$this->repository = $pageRepository;
		$this->validator = $pageValidator;
	}

}