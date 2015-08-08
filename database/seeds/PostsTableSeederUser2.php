<?php

use Illuminate\Database\Seeder;

class PostsTableSeederUser2 extends Seeder {

    public function run()
    {
        $posts = array(
            ['id' => 5,
                'user_id' => 2,
                'status' => 'posted',
                'admin_message' => null,
                'title' => '3D Metal Printed Faucets',
                'slug' => '3d-metal-printed-faucets',
                'summary' => 'Believe it or not, these are actual functioning faucets that will soon be available for purchase.',
                'thumbnail_image' => 'sink-1.jpg',
                'views' => '154',
                'created_at' => '2015-05-15 03:25:43',
                'updated_at' => '2015-05-26 03:25:43',
                'posted_at' => '2015-07-24 02:34:23',
                'category' => 'photograph'
            ],

            ['id' => 6,
                'user_id' => 2,
                'status' => 'posted',
                'admin_message' => null,
                'title' => '10 Awesome Cinemagraphs',
                'slug' => '10-awesome-cinemagraphs',
                'summary' => 'Cinemagraphs are GIFs that have a very particular set of looping and stillness properties.',
                'thumbnail_image' => 'cinemagraph-thumb.jpg',
                'views' => '322',
                'created_at' => '2015-05-15 03:25:43',
                'updated_at' => '2015-05-26 03:25:43',
                'posted_at' => '2015-07-25 03:43:23',
                'category' => 'photograph'
            ],

            ['id' => 7,
                'user_id' => 2,
                'status' => 'posted',
                'admin_message' => null,
                'title' => 'Rare White Northern Lights',
                'slug' => 'white-northern-lights',
                'summary' => 'Rare white Northern Lights captured on photography.',
                'thumbnail_image' => 'northern-thumb.jpg',
                'views' => '432',
                'created_at' => '2015-05-15 03:25:43',
                'updated_at' => '2015-05-26 03:25:43',
                'posted_at' => '2015-07-20 05:43:12',
                'category' => 'photograph'
            ],

            ['id' => 8,
                'user_id' => 2,
                'status' => 'posted',
                'admin_message' => null,
                'title' => 'WIRED\'s beautifully redesigned San Francisco office',
                'slug' => 'wireds-beautifully-redesigned-san-franscisco-office',
                'summary' => 'The tech magazine giant WIRED has recently redesigned their San Francisco office into a beautiful, modern workplace. This post summary is actually very very long.',
                'thumbnail_image' => 'wired-thumb.jpg',
                'views' => '322',
                'created_at' => '2015-05-15 03:25:43',
                'updated_at' => '2015-05-26 03:25:43',
                'posted_at' => '2015-07-21 10:34:35',
                'category' => 'photograph'
            ],

        );

        // Uncomment the below to run the seeder
        DB::table('posts')->insert($posts);
    }

}