<?php namespace SmallTimeShop\Models;

class CategoryModel extends BaseModel
{
	protected $table = "categories";

	public function products()
	{
		return $this->hasMany('SmallTimeShop\Models\ProductModel');
	}
}