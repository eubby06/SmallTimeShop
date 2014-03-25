<?php namespace SmallTimeShop\Models;

class ProductModel extends BaseModel
{
	protected $table = "products";

	protected $guarded = array('id');

	public $timestamps = false;

	public function categories()
	{
		return $this->belongsToMany('SmallTimeShop\Models\CategoryModel', 'category_product', 'product_id', 'category_id');
	}

	public function categoryIds()
	{
		$ids = array();

		foreach ($this->categories as $cat)
		{
			$ids[] = $cat->id;
		}

		return $ids;
	}
}