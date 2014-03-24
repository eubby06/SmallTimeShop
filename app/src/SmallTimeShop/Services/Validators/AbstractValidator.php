<?php namespace SmallTimeShop\Services\Validators;

use App;

abstract class AbstractValidator
{
	
	public $errors 	= array();

	protected $data 	= array();

	protected $validator;


	public function __construct()
	{
		$this->validator = App::make('validator');
	}

	public function with($data)
	{
		$this->data = $data;
		return $this;
	}

	public function errors()
	{
		return $this->errors;
	}

	public function passes()
	{
		$validator = $this->validator->make($this->data, static::$rules);

		if( $validator->fails() )
		{
			$this->errors = $validator->messages();
			return false;
		}

		return true;
	}
}