<?php namespace SmallTimeShop\Services\Validators;

abstract class AbstractValidator
{
	
	protected $errors 	= array();

	protected $data 	= array();

	public function __construct($data)
	{
		$this->data = $data;
	}

	public function errors()
	{
		return $this->errors;
	}

	public function passes()
	{
		$validator = Validator::make($this->data, static::$rules);

		if( $validator->fails() )
		{
			$this->errors = $validator->messages;
			return false;
		}

		return true;
	}
}