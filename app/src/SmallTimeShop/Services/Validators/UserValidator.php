<?php namespace SmallTimeShop\Services\Validators;

class UserValidator extends AbstractValidator
{

	public static $rules = array(
						'name' => 'required'
						);
}