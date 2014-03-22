<?php

use SmallTimeShop\Services\AccessControlService\Group\ACLGroup;

class GroupSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        DB::table('groups')->delete();

        ACLGroup::create(array(
			'id' 		=> 1,
			'name' 		=> 'admin',
			'status' 	=> 1
        	));

       ACLGroup::create(array(
			'id' 		=> 2,
			'name' 		=> 'member',
			'status' 	=> 1
        	));
	}

}