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
					$newArray[$group->id][0] = $group->name;
				}
				else
				{
					$newArray[$group->parent_id][$group->id] = $group->name;
				}
			}
		}

		array_walk_recursive($newArray, function(&$item, $key){

			$item = $key == 0 ? $item : '--' . $item;
		});

		return call_user_func_array('array_merge', $newArray);
	}
}