<?php namespace SmallTimeShop\Models;

class AttributeItemModel extends BaseModel
{
	protected $table = "attribute_items";

	public $guarded = array('id');

	public $timestamps = false;
	

	public function attributes()
	{
		return $this->belongsTo('SmallTimeShop\Models\AttributeModel');
	}
}