<?php namespace SmallTimeShop\Repositories;

interface ProductRepositoryInterface 
{

	public function all();

	public function find($id);

	public function getCurrent();
}