<?php namespace SmallTimeShop\Models;

class AttributeModel extends BaseModel
{
	protected $table = "attributes";

	public $guarded = array('id');

	public function products()
	{
		return $this->belongsToMany('SmallTimeShop\Models\ProductModel');
	}

	public function attributeItems()
	{
		return $this->hasMany('SmallTimeShop\Models\AttributeItemModel');
	}
}