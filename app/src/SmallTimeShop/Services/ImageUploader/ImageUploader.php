<?php namespace SmallTimeShop\Services\ImageUploader;

use Config, File, Log;

class ImageUploader {

	protected $imagine;

	protected $library;

	public function __construct()
	{
		if (! $this->imagine)
		{
			$this->library = Config::get('image.library', 'gd');

			if ($this->library == 'imagick') 
				$this->imagine = new \Imagine\Imagick\Imagine();
			elseif ($this->library == 'gmagick') 
				$this->imagine = new \Imagine\Gmagick\Imagine();
            elseif ($this->library == 'gd')      
            	$this->imagine = new \Imagine\Gd\Imagine();
            else  
            	$this->imagine = new \Imagine\Gd\Imagine();
		}
	}

	public function resize($url, $width = 100, $height = null, $crop = false, $quality = 90)
	{
		if ($url)
		{
			$info = pathinfo($url);

			if (! $height) 
			{
					$height = $width;
			}

			$quality = Config::get('image.quality', $quality);

			$fileName 		= $info['basename'];
			$sourceDirPath 	= public_path() . '/' . $info['dirname'];
			$sourceFilePath = $sourceDirPath . '/' . $fileName;
			$targetDirName 	= $width . 'x' . $height . ($crop ? '_crop' : '');
			$targetDirPath 	= $sourceDirPath . '/' . $targetDirName . '/';
			$targetFilePath = $targetDirPath . $fileName;
			$targetUrl 		= asset($info['dirname'] . '/' . $targetDirName . '/' . $fileName);

			try
			{
				if ( ! File::isDirectory($targetDirPath) and $targetDirPath) 
				{
					@File::makeDirectory($targetDirPath);
				}

				$size = new \Imagine\Image\Box($width, $height);

				$mode = $crop ? \Imagine\Image\ImageInterface::THUMBNAIL_OUTBOUND : \Imagine\Image\ImageInterface::THUMBNAIL_INSET;

				if ( ! File::exists($targetFilePath) or (File::lastModified($targetFilePath) < File::lastModified($sourceFilePath)))
	            {
	                $this->imagine->open($sourceFilePath)
	                              ->thumbnail($size, $mode)
	                              ->save($targetFilePath, array('quality' => $quality));
	            }
	        }
            catch (\Exception $e)
	        {
	            Log::error('[IMAGE SERVICE] Failed to resize image "' . $url . '" [' . $e->getMessage() . ']');
	        }
	 
	        return $targetUrl;
		}
	}

	public function upload($file, $dir = null, $createDimensions = false)
	{
	    if ($file)
	    {

	        // Generate random dir
	        if ( ! $dir) $dir = str_random(8);
	 
	        // Get file info and try to move
	        $destination = Config::get('image.upload_path') . $dir;
	        $filename    = $file->getClientOriginalName();
	        $path        = Config::get('image.upload_dir') . '/' . $dir . '/' . $filename;
	        $uploaded    = $file->move($destination, $filename);
	 
	        if ($uploaded)
	        {
	            if ($createDimensions) $this->createDimensions($path);
	 
	            return $path;
	        }
	    }
	}

	public function createDimensions($url, $dimensions = array())
	{
	    // Get default dimensions
	    $defaultDimensions = Config::get('image.dimensions');
	 
	    if (is_array($defaultDimensions)) $dimensions = array_merge($defaultDimensions, $dimensions);
	 
	    foreach ($dimensions as $dimension)
	    {
	        // Get dimmensions and quality
	        $width   = (int) $dimension[0];
	        $height  = isset($dimension[1]) ?  (int) $dimension[1] : $width;
	        $crop    = isset($dimension[2]) ? (bool) $dimension[2] : false;
	        $quality = isset($dimension[3]) ?  (int) $dimension[3] : Config::get('image.quality');
	 
	        // Run resizer
	        $img = $this->resize($url, $width, $height, $crop, $quality);
	    }
	}
}