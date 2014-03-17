<?php namespace SmallTimeShop\Controllers;

use View, Redirect, Input, ACL, Session, Cookie;

class LoginController extends BaseController
{
	public function getIndex()
	{
		if ( ACL::check() ) 
		{
			return Redirect::route('dashboard');
		}

		return View::make('backend.login')->with('message', Session::get('message'));
	}

	public function postIndex()
	{
		$credentials = array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
			);

		$remember = Input::get('remember') ? true : false;
		$redirectRoute = 'dashboard';

		$loginAttempt = ACL::authenticate($credentials, $remember, $redirectRoute);

		if ( $loginAttempt ) 
		{
			return Redirect::route('dashboard')->with('message', 'Welcome Back!');
		}

		return Redirect::route('get.login')->with('message', 'Username or Password is incorrect.');
	}
}