<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('posts')->delete();

        $users = array(
            ['id' => 1,
                'username'  => 'user1',
                'email'  => 'email1@gmail.com',
                'password'  => 'password1',
                'status' => 'good'
            ],

            ['id' => 2,
                'username'  => 'user2',
                'email'  => 'email2@gmail.com',
                'password'  => 'password2',
                'status' => 'good'
            ]
        );

        // Uncomment the below to run the seeder
        DB::table('users')->insert($users);
    }

}