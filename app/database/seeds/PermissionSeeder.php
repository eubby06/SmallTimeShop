<?php

use SmallTimeShop\Models\PermissionModel;

class PermissionSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        DB::table('permissions')->delete();

        PermissionModel::create(array(
			'id' 		=> 1,
			'resource' 	=> 'products',
			'action' 	=> 'create',
			'value' 	=> 1
        	));

        PermissionModel::create(array(
			'id' 		=> 2,
			'resource' 	=> 'products',
			'action' 	=> 'delete',
			'value' 	=> 1
        	));
	}

}