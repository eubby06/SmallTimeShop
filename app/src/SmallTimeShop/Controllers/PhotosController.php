<?php namespace SmallTimeShop\Controllers;

use SmallTimeShop\Entities as Entity;
use Event, ACL, Session, Cookie, View, Input, Redirect;

class PhotosController extends BaseController
{
	protected $layout = 'backend.layouts.default';
	protected $photoEntity;

	public function __construct(Entity\PhotoEntity $photoEntity)
	{
		$this->photoEntity 	= $photoEntity;
	}

	public function getIndex($id)
	{	

		$images = $this->photoEntity->getUploadedImages($id);

		$this->layout->content = View::make('backend.photos.index')
									->with('id', 4)
									->with('images', $images);

		return $this->layout;
	}

	public function postUpload($id)
	{

		$this->photoEntity->upload(Input::file('image'), $id);
		
		return 'success';
		//return Redirect::route('photos', $id);
	}
}	