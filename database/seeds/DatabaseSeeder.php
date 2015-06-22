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

		// $this->call('UserTableSeeder');

		$this->call('UsersTableSeeder');
		$this->call('PostsTableSeeder');
        $this->call('PayoutsTableSeederUser1');
        $this->call('PayoutsTableSeederUser2');
        $this->call('PayoutsTableSeederUser3');
        $this->call('PayoutsTableSeederUser4');
        $this->call('PayoutsTableSeederUser5');
	}

}
