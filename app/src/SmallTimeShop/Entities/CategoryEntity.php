<?php namespace SmallTimeShop\Entities;

use SmallTimeShop\Repositories as Repository;
use SmallTimeShop\Services\Validators\CategoryValidator;

class CategoryEntity extends AbstractEntity
{

	protected $repository;

	protected $validator;

	protected $errors;

	public function __construct(
		Repository\CategoryRepositoryInterface $categoryRepository,
		CategoryValidator $categoryValidator)
	{
		$this->repository = $categoryRepository;
		$this->validator = $categoryValidator;
	}

	public function forForm()
	{
		$all = $this->repository->all();

		$newArray = array();

		if ( ! empty($all) )
		{
			foreach ($all as $cat)
			{
				$newArray[$cat->id] = $cat->name;
			}
		}

		return $newArray;
	}

}