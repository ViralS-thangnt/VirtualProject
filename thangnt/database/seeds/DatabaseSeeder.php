<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		DB::table('Users')->insert(array(
               array(
                    'name'		=>	'admin',
                    'email'		=>	'admin@localhost',
                    'password'	=>	bcrypt('SxRVYMtn'),
                    'enable'	=>	1
                    //hash('sha256', 'SxRVYMtn')
                    )
               ));
		// $this->call('UserTableSeeder');
	}

}
