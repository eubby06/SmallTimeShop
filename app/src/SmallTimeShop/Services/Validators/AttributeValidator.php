<?php namespace SmallTimeShop\Services\Validators;

class AttributeValidator extends AbstractValidator
{

	public static $rules = array(
						'name' 			=> 'required|max:100'
						);
}