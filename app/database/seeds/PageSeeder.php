<?php

use SmallTimeShop\Models\PageModel;

class PageSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        DB::table('pages')->delete();

        PageModel::create(array(
			'id'			=> 4,
			'title'			=> 'About',
			'slug'			=> 'about-us',
			'content'		=> 'about us is ....',
			'status'		=> 1
        	));

        PageModel::create(array(
			'id'			=> 1,
			'title'			=> 'Contact',
			'slug'			=> 'contact-us',
			'content'		=> 'office: address ...',
			'status'		=> 1
        	));
	}

}