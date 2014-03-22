<?php

use SmallTimeShop\Services\AccessControlService\User\ACLUser;

class UserSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        DB::table('users')->delete();

        ACLUser::create(array(
			'id'			=> 1,
			'first_name'	=> 'John',
			'last_name'		=> 'Doe',
			'username'		=> 'johndoe',
			'email'			=> 'johndoe@gmail.com',
			'password'		=> Hash::make('admin'),
			'status'		=> 1
        	));
	}

}