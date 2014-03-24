<?php

use SmallTimeShop\Models\CategoryModel;

class CategorySeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        DB::table('categories')->delete();

        CategoryModel::create(array(
			'id'			=> 4,
			'name'			=> 'Digital',
			'slug'			=> 'digital',
			'parent_id'		=> 0,
			'status'		=> 1
        	));

        CategoryModel::create(array(
			'id'			=> 1,
			'name'			=> 'Apparels',
			'slug'			=> 'apparels',
			'parent_id'		=> 0,
			'status'		=> 1
        	));

        CategoryModel::create(array(
			'id'			=> 2,
			'name'			=> 'Pants',
			'slug'			=> 'pants',
			'parent_id'		=> 1,
			'status'		=> 1
        	));

        CategoryModel::create(array(
			'id'			=> 3,
			'name'			=> 'Shirts',
			'slug'			=> 'shirts',
			'parent_id'		=> 1,
			'status'		=> 1
        	));
	}

}