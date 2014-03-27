<?php namespace SmallTimeShop\Services\Validators;

class GroupValidator extends AbstractValidator
{

	public static $rules = array(
						'name' 	=> 'required|max:100'
						);
}