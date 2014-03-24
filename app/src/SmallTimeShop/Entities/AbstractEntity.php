<?php namespace SmallTimeShop\Entities;

abstract class AbstractEntity implements EntityInterface
{
	public function all()
	{
		return $this->repository->all();
	}

	public function find($id)
	{
		return $this->repository->find($id);
	}

	public function create(array $data)
	{
		if( ! $this->validator->with($data)->passes() )
		{
			$this->errors = $this->validator->errors();
			return false;
		}

		return $this->repository->create($data);
	}

	public function update($id = null, array $data)
	{
		if( ! $this->validator->with($data)->passes() )
		{
			$this->errors = $this->validator->errors();
			return false;
		}

		return $this->repository->update($id, $data);
	}

	public function delete($id)
	{
		return $this->repository->delete($id);
	}

	public function errors()
	{
		return $this->errors;
	}
}