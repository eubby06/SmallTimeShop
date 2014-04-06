<?php namespace SmallTimeShop\Repositories;

interface AttributeItemRepositoryInterface 
{

	public function all();

	public function find($id);

	public function create(array $data);

	public function delete($id);

	public function update($id, $data);
}