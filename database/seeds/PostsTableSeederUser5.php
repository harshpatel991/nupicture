<?php

use Illuminate\Database\Seeder;

class PostsTableSeederUser5 extends Seeder {

    public function run()
    {
        $posts = array(
            ['id' => 20,
                'user_id' => 5,
                'status' => 'pending_post',
                'admin_message' => null,
                'title' => 'A Pending Post',
                'slug' => 'post-1',
                'content_type' => 'image',
                'content' => 'Content',
                'thumbnail_image' => '1.jpg',
                'posted_at' => null,
                'cashedout_at' => null,
                'total_views' => '0',
                'views_since_payment' => '0',
                'created_at' => '2015-05-27 05:32:22',
                'updated_at' => '2015-05-28 01:25:43',
                'category' => 'art'
            ],

            ['id' => 21,
                'user_id' => 5,
                'status' => 'rejected',
                'admin_message' => 'Your post was rejected because abc def ghi jlkmnop ...',
                'title' => 'A Rejected Post Short Text',
                'slug' => 'post-2',
                'content_type' => 'short_text',
                'content' => 'Content',
                'thumbnail_image' => '2.jpg',
                'posted_at' => null,
                'cashedout_at' => null,
                'total_views' => '0',
                'views_since_payment' => '0',
                'created_at' => '2015-05-23 05:28:43',
                'updated_at' => '2015-05-26 03:25:43',
                'category' => 'cute'
            ],

            ['id' => 22,
                'user_id' => 5,
                'status' => 'posted',
                'admin_message' => null,
                'title' => 'The most powerful supercomputer in Spain, the MareNostrum',
                'slug' => 'post-3',
                'content_type' => 'list',
                'content' => '<img src="/upload/1.jpg" class="post-image">',
                'thumbnail_image' => '1.jpg',
                'posted_at' => '2015-05-22 03:25:43',
                'cashedout_at' => null,
                'total_views' => 123,
                'views_since_payment' => 123,
                'created_at' => '2015-05-21 04:25:43',
                'updated_at' => '2015-05-22 03:25:43',
                'category' => 'funny'
            ],

            ['id' => 23,
                'user_id' => 5,
                'status' => 'posted',
                'admin_message' => null,
                'title' => 'Street Art Found in Busan, South Korea',
                'slug' => 'post-4',
                'content_type' => 'article',
                'content' => '<img src="/upload/2.jpg" class="post-image">Courtesy of <a href="http://www.reddit.com/user/CrimsonLiquid">CrimsonLiquid</a>',
                'thumbnail_image' => '2.jpg',
                'posted_at' => '2015-05-20 03:25:43',
                'cashedout_at' => '2015-05-26 03:25:43',
                'total_views' => '100',
                'views_since_payment' => '25',
                'created_at' => '2015-05-19 03:25:43',
                'updated_at' => '2015-05-26 03:25:43',
                'category' => 'interesting'
            ],

            ['id' => 24,
                'user_id' => 5,
                'status' => 'posted',
                'admin_message' => null,
                'title' => '3D Metal Printed Faucets',
                'slug' => 'post-5',
                'content_type' => 'article',
                'content' => 'American Standard has created these beautiful 3D printed faucets. The faucets are created by way of a computer guided laser which fuses powered metal into these incredible shapes. These faucets are expected to begin to ready for production by June 2016. <div class="well">The [SLS] process democratizes design and decentralizes manufacturing, which will eventually upend the design and construction industry, along with many others. A new, more efficient business model for bespoke design could be on the horizon. This would reduce the inventory pressures that arise from mass production of personalized products, while opening up a new world for both design and construction.</div><div class="pull-right">-American Standard</div><img src="/upload/sink-1.jpg" class="post-image"> <img src="/upload/sink-2.jpg" class="post-image"><img src="/upload/sink-3.jpg" class="post-image"> <img src="/upload/sink-4.jpg" class="post-image"> <img src="/upload/sink-5.jpg" class="post-image"> <img src="/upload/sink-6.jpg" class="post-image">',
                'thumbnail_image' => 'sink-1.jpg',
                'posted_at' => '2015-05-18 03:25:43',
                'cashedout_at' => '2015-05-26 03:25:43',
                'total_views' => '200',
                'views_since_payment' => '50',
                'created_at' => '2015-05-15 03:25:43',
                'updated_at' => '2015-05-26 03:25:43',
                'category' => 'photograph'
            ]
        );

        // Uncomment the below to run the seeder
        DB::table('posts')->insert($posts);
    }

}