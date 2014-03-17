<?php

use SmallTimeShop\Models\GroupModel;

class GroupSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        DB::table('groups')->delete();

        GroupModel::create(array(
			'id' 		=> 1,
			'name' 		=> 'admin',
			'status' 	=> 1
        	));

       GroupModel::create(array(
			'id' 		=> 2,
			'name' 		=> 'member',
			'status' 	=> 1
        	));
	}

}