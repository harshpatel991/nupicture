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
                'summary' => 'A very powerful computer in Spain is stored in a beautiful location.',
                'thumbnail_image' => 'super-computer-1.jpg',
                'views' => '16000',
                'created_at' => '2015-05-27 05:32:22',
                'updated_at' => '2015-05-28 01:25:43',
                'posted_at' => null,
                'category' => 'art'
            ],

            //a rejected post that has enough votes to show up in large payment warning but should not
            ['id' => 11,
                'user_id' => 3,
                'status' => 'rejected',
                'admin_message' => 'Your post was rejected because abc def ghi jlkmnop ...',
                'title' => 'A Rejected Post Short Text',
                'slug' => 'post-11',
                'summary' => 'This should NEVER be shown',
                'thumbnail_image' => '2.jpg',
                'views' => '18000',
                'created_at' => '2015-05-23 05:28:43',
                'updated_at' => '2015-05-26 03:25:43',
                'posted_at' => null,
                'category' => 'cute'
            ],

            ['id' => 12,
                'user_id' => 3,
                'status' => 'posted',
                'admin_message' => null,
                'title' => 'Two Students Film Amazing 4K Video of Iceland',
                'slug' => 'post-12',
                'summary' => 'Studying at the Stuttgart Media University in Germany, Marcus Sies and Florian Nick have captured some very beautiful shots.',
                'thumbnail_image' => 'two-students-film-amazing-4k-thumb.jpg',
                'views' => 4234,
                'created_at' => '2015-06-21 04:25:43',
                'updated_at' => '2015-06-22 03:25:43',
                'posted_at' => '2015-06-26 21:31:34',
                'category' => 'photography'
            ],

            ['id' => 13,
                'user_id' => 3,
                'status' => 'posted',
                'admin_message' => null,
                'title' => 'Street Art Found in Busan, South Korea',
                'slug' => 'post-13',
                'summary' => 'A very powerful computer in Spain is stored in a beautiful location.',
                'thumbnail_image' => '2.jpg',
                'views' => 3000,
                'created_at' => '2015-05-19 03:25:43',
                'updated_at' => '2015-05-26 03:25:43',
                'posted_at' => '2015-07-27 20:44:43',
                'category' => 'interesting'
            ]
        );

        // Uncomment the below to run the seeder
        DB::table('posts')->insert($posts);
    }

}