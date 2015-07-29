<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('posts')->delete();

        $users = array(
            ['id' => 1,
                'username'  => 'MudMatter1',
                'email'  => 'email1@gmail.com',
                'password'  => bcrypt('password1'),
                'status' => 'good',
                'confirmation_code' => '1234567890ABCDE1',
                'publisher_id' => 'pub-1111111111111111'
            ],

            ['id' => 2,
                'username'  => '2eadaliz',
                'email'  => 'email2@gmail.com',
                'password'  => bcrypt('password2'),
                'status' => 'good',
                'confirmation_code' => '1234567890ABCDE2',
                'publisher_id' => 'pub-2222222222222222'
            ],

            ['id' => 3,
                'username'  => 'Network3Dipity',
                'email'  => 'email3@gmail.com',
                'password'  => bcrypt('password3'),
                'status' => 'unconfirmed',
                'confirmation_code' => '1234567890ABCDE3',
                'publisher_id' => 'pub-3333333333333333'
            ],

            ['id' => 4,
                'username'  => 'MamaJama04',
                'email'  => 'email4@gmail.com',
                'password'  => bcrypt('password4'),
                'status' => 'warning',
                'confirmation_code' => '1234567890ABCDE4',
                'publisher_id' => 'pub-4444444444444444'
            ]
        );


        // Uncomment the below to run the seeder
        DB::table('users')->insert($users);
    }

}