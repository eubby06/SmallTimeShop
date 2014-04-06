<?php namespace SmallTimeShop\Controllers;

use SmallTimeShop\Entities as Entity;
use Event, ACL, Response, Cookie, View, Input, Redirect;

class AttributeItemsController extends BaseController
{
	protected $layout = 'backend.layouts.default';
	protected $attributeItemEntity;

	public function __construct(Entity\AttributeItemEntity $attributeItemEntity)
	{
		$this->attributeItemEntity 	= $attributeItemEntity;
	}

	public function getIndex()
	{		
		$attributeItems = $this->attributeItemEntity->all();

		$this->layout->content = View::make('backend.attributesItems.index')
										->with('attributesItems', $attributeItems);

		return $this->layout;
	}

}