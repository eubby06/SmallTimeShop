<?php namespace SmallTimeShop\Services\Validators;

class UserValidator extends AbstractValidator
{

	public static $rules = array(
						'first_name' 	=> 'required|max:100',
						'last_name' 	=> 'required|max:100',
						'email'			=> 'required|email|unique:users',
						'username'		=> 'required|min:6|max:16|unique:users',
						'password' 		=> 'required|min:6|max:8|confirmed'
						);
}