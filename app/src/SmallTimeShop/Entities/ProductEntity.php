<?php namespace SmallTimeShop\Entities;

use SmallTimeShop\Repositories as Repository;
use SmallTimeShop\Services\Validators\ProductValidator;

class ProductEntity extends AbstractEntity
{

	protected $repository;

	protected $validator;

	protected $errors;

	public function __construct(
		Repository\ProductRepositoryInterface $productRepository,
		ProductValidator $productValidator)
	{
		$this->repository = $productRepository;
		$this->validator = $productValidator;
	}
}