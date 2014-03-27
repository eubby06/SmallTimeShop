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
			'parent_id' => 0,
			'status' 	=> 1
        	));

       ACLGroup::create(array(
			'id' 		=> 2,
			'name' 		=> 'member',
			'parent_id' => 0,
			'status' 	=> 1
        	));

        ACLGroup::create(array(
			'id' 		=> 3,
			'name' 		=> 'gold',
			'parent_id' => 2,
			'status' 	=> 1
        	));

        ACLGroup::create(array(
			'id' 		=> 4,
			'name' 		=> 'silver',
			'parent_id' => 2,
			'status' 	=> 1
        	));
	}

}