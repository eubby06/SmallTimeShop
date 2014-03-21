<?php namespace SmallTimeShop\Controllers;

use View, Redirect, Input, ACL, Session, Cookie;

class RegistrationController extends BaseController
{
	public function getIndex()
	{
		if ( ACL::check() ) 
		{
			return Redirect::route('dashboard');
		}

		return View::make('frontend.registration');
	}

	public function postIndex()
	{
		$attributes = Input::all();

		if (ACL::register($attributes))
		{
			return 'pass';
		}

		return Redirect::route('get.register')->withErrors(ACL::errors())->withInput();
	}
}