<?php namespace SmallTimeShop\Services\Validators;

class ProductValidator extends AbstractValidator
{

	public static $rules = array(
						'name' 			=> 'required|max:255',
						'description' 	=> 'required|max:500',
						'slug'			=> 'required|unique:products',
						'color'			=> 'required|min:3|max:16',
						'size' 			=> 'required|min:4|max:12',
						'price' 		=> 'required|numeric'
						);
}