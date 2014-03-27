<?php namespace SmallTimeShop\Controllers;

use SmallTimeShop\Entities as Entity;
use Event, ACL, Response, Cookie, View, Input, Redirect;

class PagesController extends BaseController
{
	protected $layout = 'backend.layouts.default';
	protected $pageEntity;

	public function __construct(Entity\PageEntity $pageEntity)
	{
		$this->pageEntity 	= $pageEntity;
	}

	public function getIndex()
	{		
		$pages = $this->pageEntity->all();

		$this->layout->content = View::make('backend.pages.index')
										->with('pages', $pages);

		return $this->layout;
	}

	public function getCreate()
	{		

		$this->layout->content = View::make('backend.pages.create');

		return $this->layout;
	}

	public function postStore()
	{
		$attributes = Input::all();

		$created = $this->pageEntity->create($attributes);

		if ( $created )
		{
			return Redirect::route('pages')->with('success', 'New category has been created.');
		}

		return Redirect::route('pages.create')->withErrors($this->pageEntity->errors())->withInput();
	}

	public function getEdit($id)
	{		

		$page = $this->pageEntity->find($id);

		$this->layout->content = View::make('backend.pages.edit')
									->with('page', $page);

		return $this->layout;
	}

	public function postUpdate($id)
	{

		$attributes = Input::all();

		$created = $this->pageEntity->update($id, $attributes);

		if ( $created )
		{
			return Redirect::route('pages')->with('success', 'category has been updated.');
		}

		return Redirect::route('pages.edit', $id)->withErrors($this->pageEntity->errors());
	}

	public function getDelete($id)
	{		

		$category = $this->pageEntity->delete($id);

		return Redirect::route('pages')->with('success', 'category has been deleted.');
	}
}