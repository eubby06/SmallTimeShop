<?php namespace SmallTimeShop\Entities;

interface EntityInterface
{
	public function all();

	public function find($id);

	public function create(array $data);

	public function update($id = null, array $data);

	public function delete($id);

	public function errors();
}