<?php

use SmallTimeShop\Models\ProductModel;

class ProductSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        DB::table('products')->delete();

        ProductModel::create(array(
			'id' 				=> 1,
			'name' 				=> 'Army Shirt',
			'slug' 				=> 'army-shirt',
			'description' 		=> 'Army shirt for bodybuilder',
			'price' 			=> 123,
			'discounted_price' 	=> 112,
			'color' 			=> 'Green',
			'size' 				=> 'Medium',
			'type' 				=> 'Single',
			'status' 			=> 1
        	));

        ProductModel::create(array(
			'id' 				=> 2,
			'name' 				=> 'Working Polo',
			'slug' 				=> 'working-polo',
			'description' 		=> 'Working Polo for working people',
			'price' 			=> 353,
			'discounted_price' 	=> 222,
			'color' 			=> 'Striped',
			'size' 				=> 'Large',
			'type' 				=> 'Single',
			'status' 			=> 1
        	));

        ProductModel::create(array(
			'id' 				=> 3,
			'name' 				=> 'Slim Shirt',
			'slug' 				=> 'slim-shirt',
			'description' 		=> 'Plain Tshirt',
			'price' 			=> 428,
			'discounted_price' 	=> 315,
			'color' 			=> 'Blue',
			'size' 				=> 'Extra Small',
			'type' 				=> 'Single',
			'status' 			=> 1
        	));
	}

}