<?php namespace SmallTimeShop\Models;

class CategoryModel extends BaseModel
{
	protected $table = "categories";

	public $guarded = array('id');

	public function products()
	{
		return $this->hasMany('SmallTimeShop\Models\ProductModel');
	}

	public function parent()
	{
		return $this->belongsTo('SmallTimeShop\Models\CategoryModel', 'parent_id');
	}
}