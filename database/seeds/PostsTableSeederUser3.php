<?php

use Illuminate\Database\Seeder;

class PostsTableSeederUser3 extends Seeder {

    public function run()
    {
        $posts = array(
            //a pending post that has enough votes to show up in large payment warning but should not
            ['id' => 10,
                'user_id' => 3,
                'status' => 'pending_post',
                'admin_message' => null,
                'title' => 'A Pending Post',
                'slug' => 'post-10',
                'content_type' => 'image',
                'content' => 'Content',
                'thumbnail_image' => '1.jpg',
                'posted_at' => null,
                'cashedout_at' => null,
                'total_views' => '16000',
                'views_since_payment' => '16000',
                'created_at' => '2015-05-27 05:32:22',
                'updated_at' => '2015-05-28 01:25:43',
                'category' => 'art'
            ],

            //a rejected post that has enough votes to show up in large payment warning but should not
            ['id' => 11,
                'user_id' => 3,
                'status' => 'rejected',
                'admin_message' => 'Your post was rejected because abc def ghi jlkmnop ...',
                'title' => 'A Rejected Post Short Text',
                'slug' => 'post-11',
                'content_type' => 'short_text',
                'content' => 'Content',
                'thumbnail_image' => '2.jpg',
                'posted_at' => null,
                'cashedout_at' => null,
                'total_views' => '18000',
                'views_since_payment' => '18000',
                'created_at' => '2015-05-23 05:28:43',
                'updated_at' => '2015-05-26 03:25:43',
                'category' => 'cute'
            ],

            //next two should trigger large payment warning for ~17000
            ['id' => 12,
                'user_id' => 3,
                'status' => 'posted',
                'admin_message' => null,
                'title' => 'The most powerful supercomputer in Spain, the MareNostrum',
                'slug' => 'post-12',
                'content_type' => 'list',
                'content' => '<img src="/upload/1.jpg" class="post-image">',
                'thumbnail_image' => '1.jpg',
                'posted_at' => '2015-05-22 03:25:43',
                'cashedout_at' => null,
                'total_views' => 4000,
                'views_since_payment' => 4000,
                'created_at' => '2015-05-21 04:25:43',
                'updated_at' => '2015-05-22 03:25:43',
                'category' => 'funny'
            ],

            ['id' => 13,
                'user_id' => 3,
                'status' => 'posted',
                'admin_message' => null,
                'title' => 'Street Art Found in Busan, South Korea',
                'slug' => 'post-13',
                'content_type' => 'article',
                'content' => '<img src="/upload/2.jpg" class="post-image">Courtesy of <a href="http://www.reddit.com/user/CrimsonLiquid">CrimsonLiquid</a>',
                'thumbnail_image' => '2.jpg',
                'posted_at' => '2015-05-20 03:25:43',
                'cashedout_at' => '2015-05-26 03:25:43',
                'total_views' => 3000,
                'views_since_payment' => 3000,
                'created_at' => '2015-05-19 03:25:43',
                'updated_at' => '2015-05-26 03:25:43',
                'category' => 'interesting'
            ]
        );

        // Uncomment the below to run the seeder
        DB::table('posts')->insert($posts);
    }

}