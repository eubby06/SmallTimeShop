<?php namespace SmallTimeShop\Entities;

use SmallTimeShop\Repositories as Repository;
use SmallTimeShop\Services\Validators\GroupValidator;

class GroupEntity extends AbstractEntity
{

	protected $repository;

	protected $validator;

	protected $errors;

	public function __construct(
		Repository\GroupRepositoryInterface $groupRepository,
		GroupValidator $groupValidator)
	{
		$this->repository = $groupRepository;
		$this->validator = $groupValidator;
	}

	public function forForm()
	{
		$all = $this->repository->all();

		$newArray = array();

		if ( ! empty($all) )
		{
			foreach ($all as $group)
			{
				if ($group->parent_id == 0)
				{
					$newArray[$group->id][$group->id] = $group->name;
				}
				else
				{
					$newArray[$group->parent_id][$group->id] = $group->name;
				}
			}
		}

		array_walk_recursive($newArray, function(&$item, $key){

			if($item != 'admin' && $item != 'member')
			{
				$item = '--' . $item;
			}

		});

		$new = array();

		foreach($newArray as $arr)
		{
			$new = $new + $arr;
		}

		return $new;
	}
}