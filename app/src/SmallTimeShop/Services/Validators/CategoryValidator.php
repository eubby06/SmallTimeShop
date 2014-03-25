<?php namespace SmallTimeShop\Services\Validators;

class CategoryValidator extends AbstractValidator
{

	public static $rules = array(
						'name' 			=> 'required|max:255',
						'slug'			=> 'required|unique:categories',
						'parent_id'		=> 'required|numeric',
						'status' 		=> 'required|numeric'
						);

	public function setIdForUniqueRule($id)
	{
		self::$rules['slug'] = 'required|unique:categories,slug,' . $id;
	}
}