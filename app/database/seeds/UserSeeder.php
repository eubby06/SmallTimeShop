<?php

use SmallTimeShop\Models\UserModel;

class UserSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        DB::table('users')->delete();

        UserModel::create(array(
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