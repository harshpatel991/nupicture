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
                'status' => 'good',
                'publisher_id' => 'pub-1111111111111111'
            ],

            ['id' => 2,
                'username'  => 'user2',
                'email'  => 'email2@gmail.com',
                'password'  => 'password2',
                'status' => 'good',
                'publisher_id' => 'pub-2222222222222222'
            ],

            ['id' => 3,
                'username'  => 'user3',
                'email'  => 'email3@gmail.com',
                'password'  => 'password2',
                'status' => 'good',
                'publisher_id' => 'pub-3333333333333333'
            ],

            ['id' => 4,
                'username'  => 'user4',
                'email'  => 'email4@gmail.com',
                'password'  => 'password2',
                'status' => 'warning',
                'publisher_id' => 'pub-4444444444444444'
            ],

            ['id' => 5,
                'username'  => 'user5',
                'email'  => 'email5@gmail.com',
                'password'  => 'password2',
                'status' => 'warning',
                'publisher_id' => 'pub-5555555555555555'
            ]
        );

        // Uncomment the below to run the seeder
        DB::table('users')->insert($users);
    }

}