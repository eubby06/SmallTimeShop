<?php namespace SmallTimeShop\Services\Validators;

class PageValidator extends AbstractValidator
{

	public static $rules = array(
						'title' 		=> 'required|max:255',
						'content' 		=> 'required|min:5',
						'slug'			=> 'required|unique:categories',
						'status' 		=> 'required|numeric'
						);

	public function setIdForUniqueRule($id)
	{
		self::$rules['slug'] = 'required|unique:pages,slug,' . $id;
	}
}