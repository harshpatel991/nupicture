<?php

use Illuminate\Database\Seeder;

class PostsTableSeederUser1 extends Seeder {

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('posts')->delete();

        $posts = array(
            //pending post
            ['id' => 1,
                'user_id' => 1,
                'status' => 'pending_post',
                'admin_message' => null,
                'title' => 'A Pending Post',
                'slug' => 'post-1',
                'summary' => 'Test',
                'thumbnail_image' => 'test.jpg',
                'views' => '0',
                'created_at' => '2015-05-27 05:32:22',
                'updated_at' => '2015-05-28 01:25:43',
                'posted_at' => null,
                'category' => 'art'
            ],
            //rejected post
            ['id' => 2,
                'user_id' => 1,
                'status' => 'rejected',
                'admin_message' => 'Your post was rejected because abc def ghi jlkmnop ...',
                'title' => 'A Rejected Post Short Text',
                'slug' => 'post-2',
                'summary' => 'This should NEVER be shown',
                'thumbnail_image' => '2.jpg',
                'views' => '0',
                'created_at' => '2015-05-23 05:28:43',
                'updated_at' => '2015-05-26 03:25:43',
                'posted_at' => null,
                'category' => 'cute'
            ],

            ['id' => 3,
                'user_id' => 1,
                'status' => 'posted',
                'admin_message' => null,
                'title' => 'The most powerful supercomputer in Spain, the MareNostrum',
                'slug' => 'the-most-powerful-supercomputer-in-spain',
                'summary' => 'A very powerful computer in Spain is stored in a beautiful location.',
                'thumbnail_image' => 'super-computer-thumb.jpg',
                'views' => 126,
                'created_at' => '2015-05-21 04:25:43',
                'updated_at' => '2015-05-22 03:25:43',
                'posted_at' => '2015-07-22 03:54:23',
                'category' => 'woah'
            ],

            ['id' => 4,
                'user_id' => 1,
                'status' => 'posted',
                'admin_message' => null,
                'title' => 'Street Art in Busan, South Korea',
                'slug' => 'street-art-busan-south-korea',
                'summary' => 'This beautiful street art found in South Korea on the side of a building.',
                'thumbnail_image' => 'street-art-thumb.jpg',
                'views' => '214',
                'created_at' => '2015-05-19 03:25:43',
                'updated_at' => '2015-05-26 03:25:43',
                'posted_at' => '2015-07-23 01:36:11',
                'category' => 'interesting'
            ]
        );

        // Uncomment the below to run the seeder
        DB::table('posts')->insert($posts);
    }

}