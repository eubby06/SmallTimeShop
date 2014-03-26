<?php namespace SmallTimeShop\Entities;

use ImageUploader;

class PhotoEntity extends AbstractEntity
{

	protected $repository;

	protected $validator;

	protected $errors;

	public function upload(array $inputs, $productId)
	{
		foreach ($inputs as $input)
		{
			ImageUploader::upload($input, 'products/' . $productId, true);
		}

		return;
	}

	public function getUploadedImages($productId)
	{
		$directory = 'uploads/products/' . $productId . '/100x100_crop/';

		if (file_exists($directory))
		{
			$scannedDirectory = array_diff(scandir($directory), array('..', '.', '.DS_Store'));

			$imagesOnly = array_filter($scannedDirectory, function($file) use ($productId){
				return !is_dir('uploads/products/' . $productId . '/100x100_crop/' . $file);
			});

			array_walk($imagesOnly, function(&$file) use ($productId) {
				$file = 'uploads/products/' . $productId . '/100x100_crop/' . $file;
			});

			return $imagesOnly;		
		}

		return false;
	}
}