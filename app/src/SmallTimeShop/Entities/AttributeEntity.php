<?php namespace SmallTimeShop\Entities;

use SmallTimeShop\Repositories as Repository;
use SmallTimeShop\Services\Validators\AttributeValidator;

class AttributeEntity extends AbstractEntity
{

	protected $repository;

	protected $validator;

	protected $errors;

	public function __construct(
		Repository\AttributeRepositoryInterface $attributeRepository,
		AttributeValidator $attributeValidator)
	{
		$this->repository = $attributeRepository;
		$this->validator = $attributeValidator;
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