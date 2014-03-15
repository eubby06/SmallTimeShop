<?php namespace SmallTimeShop\Facades;

use Illuminate\Support\Facades\Facade;

class ACLFacade extends Facade
{
	protected static function getFacadeAccessor() { return 'ACL'; }
}