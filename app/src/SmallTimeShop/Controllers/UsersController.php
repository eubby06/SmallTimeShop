<?php namespace SmallTimeShop\Controllers;

use SmallTimeShop\Entities as Entity;
use Event, ACL, Response, Cookie, View, Input, Redirect;

class UsersController extends BaseController
{
	protected $layout = 'backend.layouts.default';
	protected $userEntity;
	protected $groupEntity;

	public function __construct(Entity\UserEntity $userEntity, Entity\GroupEntity $groupEntity)
	{
		$this->userEntity 	= $userEntity;
		$this->groupEntity 	= $groupEntity;
	}

	public function getIndex()
	{		
		$users = $this->userEntity->all();

		$this->layout->content = View::make('backend.users.index')
										->with('users', $users);

		return $this->layout;
	}

	public function getCreate()
	{		
		$groups = $this->groupEntity->forForm();

		$this->layout->content = View::make('backend.users.create')
										->with('groups', $groups);

		return $this->layout;
	}

	public function postStore()
	{
		$attributes = Input::all();

		$created = $this->userEntity->create($attributes);

		if ( $created )
		{
			return Redirect::route('users')->with('success', 'New user has been created.');
		}

		return Redirect::route('users.create')->withErrors($this->userEntity->errors())->withInput();
	}

	public function getEdit($id)
	{		
		$users = array_merge(array('0' => 'None'), $this->userEntity->forForm());
		$user = $this->userEntity->find($id);

		$this->layout->content = View::make('backend.users.edit')
									->with('user', $user)
									->with('users', $users);

		return $this->layout;
	}

	public function postUpdate($id)
	{

		$attributes = Input::all();

		$created = $this->userEntity->update($id, $attributes);

		if ( $created )
		{
			return Redirect::route('users')->with('success', 'user has been updated.');
		}

		return Redirect::route('users.edit', $id)->withErrors($this->userEntity->errors());
	}

	public function getDelete($id)
	{		

		$user = $this->userEntity->delete($id);

		return Redirect::route('users')->with('success', 'user has been deleted.');
	}
}