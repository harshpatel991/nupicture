<?php

use Illuminate\Database\Seeder;

class PostsTableSeederUser4 extends Seeder {

    public function run()
    {
        $posts = array(
            ['id' => 15,
                'user_id' => 4,
                'status' => 'pending_post',
                'admin_message' => null,
                'title' => 'A Pending Post',
                'slug' => 'post-15',
                'summary' => 'A very powerful computer in Spain is stored in a beautiful location.',
                'thumbnail_image' => 'super-computer-1.jpg',
                'views' => '0',
                'created_at' => '2015-05-27 05:32:22',
                'updated_at' => '2015-05-28 01:25:43',
                'posted_at' => null,
                'category' => 'art'
            ],

            ['id' => 16,
                'user_id' => 4,
                'status' => 'rejected',
                'admin_message' => 'Your post was rejected because abc def ghi jlkmnop ...',
                'title' => 'A Rejected Post Short Text',
                'slug' => 'post-16',
                'summary' => 'This should NEVER be shown',
                'thumbnail_image' => '2.jpg',
                'views' => '0',
                'created_at' => '2015-05-23 05:28:43',
                'updated_at' => '2015-05-26 03:25:43',
                'posted_at' => null,
                'category' => 'cute'
            ],

            ['id' => 17,
                'user_id' => 4,
                'status' => 'posted',
                'admin_message' => null,
                'title' => 'The most powerful supercomputer in Spain, the MareNostrum',
                'slug' => 'post-17',
                'summary' => 'A very powerful computer in Spain is stored in a beautiful location.',
                'thumbnail_image' => 'super-computer-1.jpg',
                'views' => 123,
                'created_at' => '2015-05-21 04:25:43',
                'updated_at' => '2015-05-22 03:25:43',
                'posted_at' => '2015-07-26 12:33:24',
                'category' => 'funny'
            ],

            ['id' => 18,
                'user_id' => 4,
                'status' => 'posted',
                'admin_message' => null,
                'title' => 'Street Art Found in Busan, South Korea',
                'slug' => 'post-18',
                'summary' => 'A very powerful computer in Spain is stored in a beautiful location.',
                'thumbnail_image' => '2.jpg',
                'views' => '100',
                'created_at' => '2015-05-19 03:25:43',
                'updated_at' => '2015-05-26 03:25:43',
                'posted_at' => '2015-07-25 21:43:32',
                'category' => 'interesting'
            ],

            ['id' => 19,
                'user_id' => 4,
                'status' => 'posted',
                'admin_message' => null,
                'title' => '3D Metal Printed Faucets',
                'slug' => 'post-19',
                'summary' => 'Believe it or not, these are actual functioning faucets that will soon be aviable for purchase.',
                'thumbnail_image' => 'sink-1.jpg',
                'views' => '200',
                'created_at' => '2015-05-15 03:25:43',
                'updated_at' => '2015-05-26 03:25:43',
                'posted_at' => '2015-07-25 10:42:32',
                'category' => 'photograph'
            ]
        );

        // Uncomment the below to run the seeder
        DB::table('posts')->insert($posts);
    }

}