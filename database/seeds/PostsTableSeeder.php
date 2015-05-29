<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder {

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
                'content_type' => 'image',
                'content' => '/images/a-pending-post',
                'posted_at' => null,
                'cashedout_at' => null,
                'total_views' => '0',
                'views_since_payment' => '0',
                'created_at' => '2015-05-27 05:32:22',
                'updated_at' => '2015-05-28 01:25:43'
            ],

            ['id' => 2,
                'user_id' => 1,
                'status' => 'rejected',
                'admin_message' => 'Your post was rejected because abc def ghi jlkmnop ...',
                'title' => 'A Rejected Post Short Text',
                'slug' => 'post-2',
                'content_type' => 'short_text',
                'content' => 'This is a short post. It an only contain very few words...',
                'posted_at' => null,
                'cashedout_at' => null,
                'total_views' => '0',
                'views_since_payment' => '0',
                'created_at' => '2015-05-23 05:28:43',
                'updated_at' => '2015-05-26 03:25:43'
            ],

            ['id' => 3,
                'user_id' => 1,
                'status' => 'posted',
                'admin_message' => null,
                'title' => 'A Posted List Post',
                'slug' => 'post-3',
                'content_type' => 'list',
                'content' => 'This is a list post....',
                'posted_at' => '2015-05-22 03:25:43',
                'cashedout_at' => null,
                'total_views' => 123,
                'views_since_payment' => 123,
                'created_at' => '2015-05-21 04:25:43',
                'updated_at' => '2015-05-22 03:25:43'
            ],

            ['id' => 4,
                'user_id' => 1,
                'status' => 'posted',
                'admin_message' => null,
                'title' => 'A Posted Article Post',
                'slug' => 'post-4',
                'content_type' => 'article',
                'content' => 'This is an article',
                'posted_at' => '2015-05-20 03:25:43',
                'cashedout_at' => '2015-05-26 03:25:43',
                'total_views' => '100',
                'views_since_payment' => '25',
                'created_at' => '2015-05-19 03:25:43',
                'updated_at' => '2015-05-26 03:25:43'
            ],


            ['id' => 5,
                'user_id' => 2,
                'status' => 'posted',
                'admin_message' => null,
                'title' => 'A Article Post Owned By 2',
                'slug' => 'post-5',
                'content_type' => 'article',
                'content' => 'This is an article by user 2. An article can have lots and lots of text in it.',
                'posted_at' => '2015-05-18 03:25:43',
                'cashedout_at' => '2015-05-26 03:25:43',
                'total_views' => '200',
                'views_since_payment' => '50',
                'created_at' => '2015-05-15 03:25:43',
                'updated_at' => '2015-05-26 03:25:43'
            ]
        );

        // Uncomment the below to run the seeder
        DB::table('posts')->insert($posts);
    }

}