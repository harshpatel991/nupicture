<?php

use Illuminate\Database\Seeder;

class PostsTableSeederUser4 extends Seeder {

    public function run()
    {
        $posts = array(
            //pending post
            ['id' => 15,
                'user_id' => 4,
                'status' => 'pending_post',
                'admin_message' => null,
                'title' => 'Pending',
                'slug' => 'post-15',
                'summary' => '',
                'thumbnail_image' => '',
                'views' => '0',
                'created_at' => '2015-08-06 05:32:22',
                'updated_at' => '2015-08-06 01:25:43',
                'posted_at' => null,
                'category' => 'art'
            ],
            //rejected post
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
                'title' => 'Tesla Demos Prototype Automatic Charger',
                'slug' => 'telsa-demos-prototype-charger',
                'summary' => 'This robot arm automatically finds the charging port on Tesla vehicles.',
                'thumbnail_image' => 'tesla-thumb.jpg',
                'views' => 403,
                'created_at' => '2015-08-06 12:25:43',
                'updated_at' => '2015-08-06 12:33:24',
                'posted_at' => '2015-08-06 12:33:24',
                'category' => 'woah'
            ],

            ['id' => 18,
                'user_id' => 4,
                'status' => 'posted',
                'admin_message' => null,
                'title' => 'Create Your Own Personal Hologram Display',
                'slug' => 'create-your-own-personal-hologram',
                'summary' => 'Using a CD case, an exacto knife and some pieces of page, you can create your own hologram display.',
                'thumbnail_image' => 'hologram-thumb.jpg',
                'views' => '192',
                'created_at' => '2015-08-04 13:25:43',
                'updated_at' => '2015-08-04 13:26:12',
                'posted_at' => '2015-08-04 13:27:32',
                'category' => 'interesting'
            ],

            ['id' => 19,
                'user_id' => 4,
                'status' => 'posted',
                'admin_message' => null,
                'title' => 'Game Of Polygons: Artist Recreates Characters in Low Poly',
                'slug' => 'post-19',
                'summary' => 'An Israeli artist has recreated famous portraits of your favorite Game of Thrones characters in low poly.',
                'thumbnail_image' => 'got-thumb.jpg',
                'views' => '2361',
                'created_at' => '2015-08-07 20:33:12',
                'updated_at' => '2015-08-07 20:34:12',
                'posted_at' => '2015-08-07 20:34:12',
                'category' => 'tv'
            ],

            ['id' => 20,
                'user_id' => 4,
                'status' => 'posted',
                'admin_message' => null,
                'title' => '5 Things Every Man Should Know',
                'slug' => '5-things-every-man-should-know',
                'summary' => 'Ever feel like there was a manual that you missed out on things guys should know about?',
                'thumbnail_image' => 'man-thumb.jpg',
                'views' => '1104',
                'created_at' => '2015-08-07 20:23:12',
                'updated_at' => '2015-08-07 20:24:12',
                'posted_at' => '2015-08-07 20:44:12',
                'category' => 'how-to'
            ],

            ['id' => 21,
                'user_id' => 4,
                'status' => 'posted',
                'admin_message' => null,
                'title' => '5 Videos That Will Infect You With Their Laughter',
                'slug' => '10-videos-that-will-have-you-crying',
                'summary' => '',
                'thumbnail_image' => 'laugh-thumb.jpg',
                'views' => '1050',
                'created_at' => '2015-08-09 14:34:12',
                'updated_at' => '2015-08-09 14:44:12',
                'posted_at' => '2015-08-09 14:44:12',
                'category' => 'funny'
            ]
        );

        // Uncomment the below to run the seeder
        DB::table('posts')->insert($posts);
    }

}