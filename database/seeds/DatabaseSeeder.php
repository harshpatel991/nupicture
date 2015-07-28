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
		$this->call('PayoutsTableSeeder');
        $this->call('PostsTableSeederUser1');
        $this->call('PostsTableSeederUser2');
        $this->call('PostsTableSeederUser3');
        $this->call('PostsTableSeederUser4');
        $this->call('SectionTableSeederUser1');
        $this->call('SectionTableSeederUser2');
        $this->call('SectionTableSeederUser3');
	}

}
