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
                'thumbnail_image' => 'sink-1.jpg',
                'views' => '200',
                'created_at' => '2015-05-15 03:25:43',
                'updated_at' => '2015-05-26 03:25:43',
                'category' => 'photograph'
            ],

            ['id' => 6,
                'user_id' => 2,
                'status' => 'posted',
                'admin_message' => null,
                'title' => '10 Awesome Cinemagraphs',
                'slug' => '10-awesome-cinemagraphs',
                'thumbnail_image' => 'cinemagraph-thumb.jpg',
                'views' => '200',
                'created_at' => '2015-05-15 03:25:43',
                'updated_at' => '2015-05-26 03:25:43',
                'category' => 'photograph'
            ],

            ['id' => 7,
                'user_id' => 2,
                'status' => 'posted',
                'admin_message' => null,
                'title' => 'White Northern Lights',
                'slug' => 'white-northern-lights',
                'thumbnail_image' => 'northern-1.jpg',
                'views' => '200',
                'created_at' => '2015-05-15 03:25:43',
                'updated_at' => '2015-05-26 03:25:43',
                'category' => 'photograph'
            ],

            ['id' => 8,
                'user_id' => 2,
                'status' => 'posted',
                'admin_message' => null,
                'title' => 'WIRED\'s beautifully redesigned San Francisco office',
                'slug' => 'wireds-beautifully-redesigned-san-franscisco-office',
                'thumbnail_image' => 'wired-1.jpg',
                'views' => '200',
                'created_at' => '2015-05-15 03:25:43',
                'updated_at' => '2015-05-26 03:25:43',
                'category' => 'photograph'
            ],

        );

        // Uncomment the below to run the seeder
        DB::table('posts')->insert($posts);
    }

}