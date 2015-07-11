<?php

use Illuminate\Database\Seeder;

class PostsTableSeederUser1 extends Seeder {

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('posts')->delete();

        $posts = array(
            ['id' => 1,
                'user_id' => 1,
                'status' => 'pending_post',
                'admin_message' => null,
                'title' => 'A Pending Post',
                'slug' => 'post-1',
                'content' => 'Content',
                'thumbnail_image' => '1.jpg',
                'posted_at' => null,
                'views' => '0',
                'created_at' => '2015-05-27 05:32:22',
                'updated_at' => '2015-05-28 01:25:43',
                'category' => 'art'
            ],

            ['id' => 2,
                'user_id' => 1,
                'status' => 'rejected',
                'admin_message' => 'Your post was rejected because abc def ghi jlkmnop ...',
                'title' => 'A Rejected Post Short Text',
                'slug' => 'post-2',
                'content' => 'Content',
                'thumbnail_image' => '2.jpg',
                'posted_at' => null,
                'views' => '0',
                'created_at' => '2015-05-23 05:28:43',
                'updated_at' => '2015-05-26 03:25:43',
                'category' => 'cute'
            ],

            ['id' => 3,
                'user_id' => 1,
                'status' => 'posted',
                'admin_message' => null,
                'title' => 'The most powerful supercomputer in Spain, the MareNostrum',
                'slug' => 'post-3',
                'content' => '<img src="/upload/1.jpg" class="post-image">',
                'thumbnail_image' => '1.jpg',
                'posted_at' => '2015-05-22 03:25:43',
                'views' => 123,
                'created_at' => '2015-05-21 04:25:43',
                'updated_at' => '2015-05-22 03:25:43',
                'category' => 'funny'
            ],

            ['id' => 4,
                'user_id' => 1,
                'status' => 'posted',
                'admin_message' => null,
                'title' => 'Street Art in Busan, South Korea',
                'slug' => 'post-4',
                'content' => '<img src="/upload/2.jpg" class="post-image">Courtesy of <a href="http://www.reddit.com/user/CrimsonLiquid">CrimsonLiquid</a>',
                'thumbnail_image' => '2.jpg',
                'posted_at' => '2015-05-20 03:25:43',
                'views' => '100',
                'created_at' => '2015-05-19 03:25:43',
                'updated_at' => '2015-05-26 03:25:43',
                'category' => 'interesting'
            ]
        );

        // Uncomment the below to run the seeder
        DB::table('posts')->insert($posts);
    }

}