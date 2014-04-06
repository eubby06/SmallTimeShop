<?php namespace SmallTimeShop\Controllers;

use SmallTimeShop\Entities as Entity;
use Event, ACL, Response, Cookie, View, Input, Redirect;

class AttributesController extends BaseController
{
	protected $layout = 'backend.layouts.default';
	protected $attributeEntity;

	public function __construct(Entity\AttributeEntity $attributeEntity)
	{
		$this->attributeEntity 	= $attributeEntity;
	}

	public function getIndex()
	{		
		$attributes = $this->attributeEntity->all();

		$this->layout->content = View::make('backend.attributes.index')
										->with('attributes', $attributes);

		return $this->layout;
	}

}