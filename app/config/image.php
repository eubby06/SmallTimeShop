<?php

return array(
	'library' 		=> 'gd',
	'upload_dir'	=> 'uploads',
	'upload_path'	=> public_path() . '/uploads/',
	'quality' 		=> 85,

	'dimensions' => array(
    'thumb'  => array(100, 100, true,  80),
    'medium' => array(600, 400, false, 90),
    )
);