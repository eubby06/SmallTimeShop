<?php namespace SmallTimeShop\Facades;

use Illuminate\Support\Facades\Facade;

class ImageUploaderFacade extends Facade
{
	protected static function getFacadeAccessor() { return 'ImageUploader'; }
}