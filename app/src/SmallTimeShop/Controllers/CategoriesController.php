<?php namespace SmallTimeShop\Controllers;

use SmallTimeShop\Entities as Entity;
use Event, ACL, Response, Cookie, View, Input, Redirect;

class CategoriesController extends BaseController
{
	protected $layout = 'backend.layouts.default';
	protected $categoryEntity;

	public function __construct(Entity\CategoryEntity $categoryEntity)
	{
		$this->categoryEntity 	= $categoryEntity;
	}

	public function getIndex()
	{		
		$categories = $this->categoryEntity->all();

		$this->layout->content = View::make('backend.categories.index')
										->with('categories', $categories);

		return $this->layout;
	}

	public function getCreate()
	{		
		$categories = array_merge(array('0' => 'None'), $this->categoryEntity->forForm());
		$this->layout->content = View::make('backend.categories.create')
										->with('categories', $categories);

		return $this->layout;
	}

	public function postStore()
	{
		$attributes = Input::all();

		$created = $this->categoryEntity->create($attributes);

		if ( $created )
		{
			return Redirect::route('categories')->with('success', 'New category has been created.');
		}

		return Redirect::route('categories.create')->withErrors($this->categoryEntity->errors())->withInput();
	}

	public function getEdit($id)
	{		
		$categories = array_merge(array('0' => 'None'), $this->categoryEntity->forForm());
		$category = $this->categoryEntity->find($id);

		$this->layout->content = View::make('backend.categories.edit')
									->with('category', $category)
									->with('categories', $categories);

		return $this->layout;
	}

	public function postUpdate($id)
	{

		$attributes = Input::all();

		$created = $this->categoryEntity->update($id, $attributes);

		if ( $created )
		{
			return Redirect::route('categories')->with('success', 'category has been updated.');
		}

		return Redirect::route('categories.edit', $id)->withErrors($this->categoryEntity->errors());
	}

	public function getDelete($id)
	{		

		$category = $this->categoryEntity->delete($id);

		return Redirect::route('categories')->with('success', 'category has been deleted.');
	}
}