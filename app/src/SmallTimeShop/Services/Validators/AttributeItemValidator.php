<?php namespace SmallTimeShop\Services\Validators;

class AttributeItemValidator extends AbstractValidator
{

	public static $rules = array(
						'attribute_item' 			=> 'required|numeric',
						'name' 						=> 'required|max:100'
						);
}