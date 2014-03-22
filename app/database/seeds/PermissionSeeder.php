<?php

use SmallTimeShop\Services\AccessControlService\Permission\ACLPermission;

class PermissionSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        DB::table('permissions')->delete();

        ACLPermission::create(array(
			'id' 		=> 1,
			'resource' 	=> 'products',
			'action' 	=> 'create',
			'value' 	=> 1
        	));

        ACLPermission::create(array(
			'id' 		=> 2,
			'resource' 	=> 'products',
			'action' 	=> 'delete',
			'value' 	=> 1
        	));
	}

}