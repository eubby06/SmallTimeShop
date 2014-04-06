<?php namespace SmallTimeShop\Entities;

use SmallTimeShop\Repositories as Repository;
use SmallTimeShop\Services\Validators\AttributeItemValidator;

class AttributeItemEntity extends AbstractEntity
{

	protected $repository;

	protected $validator;

	protected $errors;

	public function __construct(
		Repository\AttributeItemRepositoryInterface $attributeItemRepository,
		AttributeItemValidator $attributeItemValidator)
	{
		$this->repository = $attributeItemRepository;
		$this->validator = $attributeItemValidator;
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