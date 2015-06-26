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
                'slug' => 'post-5',
                'content_type' => 'article',
                'content' => 'American Standard has created these beautiful 3D printed faucets. The faucets are created by way of a computer guided laser which fuses powered metal into these incredible shapes. '.
                            'These faucets are expected to begin to ready for production by June 2016. <div class="well">The [SLS] process democratizes design and decentralizes manufacturing, which will eventually upend the design and construction industry, along with many others. '.
                            'A new, more efficient business model for bespoke design could be on the horizon. This would reduce the inventory pressures that arise from mass production of personalized products, while opening up a new world for both design and construction. '.
                            '</div><div class="pull-right">-American Standard</div><img src="/upload/sink-1.jpg" class="post-image"> <img src="/upload/sink-2.jpg" class="post-image"><img src="/upload/sink-3.jpg" class="post-image"> <img src="/upload/sink-4.jpg" class="post-image"> <img src="/upload/sink-5.jpg" class="post-image"> <img src="/upload/sink-6.jpg" class="post-image">',
                'thumbnail_image' => 'sink-1.jpg',
                'posted_at' => '2015-05-18 03:25:43',
                'cashedout_at' => '2015-05-26 03:25:43',
                'total_views' => '200',
                'views_since_payment' => '50',
                'created_at' => '2015-05-15 03:25:43',
                'updated_at' => '2015-05-26 03:25:43',
                'category' => 'photograph'
            ],

            ['id' => 6,
                'user_id' => 2,
                'status' => 'posted',
                'admin_message' => null,
                'title' => '10 of the most Awesome Cinemagraphs',
                'slug' => 'post-6',
                'content_type' => 'article',
                'content' => '1. <img src="/upload/cinemagraph-1.gif" class="post-image"> Thanks to <a href="http://www.reddit.com/user/relevant__comment">relevant__comment</a> on reddit for permission to use this image.' .
                            '<br>2. <video loop autoplay class="post-image"><source src="/upload/cinemagraph-2.webm" type="video/webm"> </video>Thanks to <a href="http://bonvallet.deviantart.com">Chronoraven</a> on reddit for permission to use this image.',
                'thumbnail_image' => 'cinemagraph-thumb.jpg',
                'posted_at' => '2015-05-18 03:25:43',
                'cashedout_at' => '2015-05-26 03:25:43',
                'total_views' => '200',
                'views_since_payment' => '50',
                'created_at' => '2015-05-15 03:25:43',
                'updated_at' => '2015-05-26 03:25:43',
                'category' => 'photograph'
            ],

            ['id' => 7,
                'user_id' => 2,
                'status' => 'posted',
                'admin_message' => null,
                'title' => 'White Northern Lights',
                'slug' => 'post-7',
                'content_type' => 'article',
                'content' => 'These white Northern Lights appeared in Finland. The Northern Lights are a beautiful display caused by emissions from the sun hitting the Earth\'s atmosphere. '.
                    'These images reveal a fairly common display of the Aurora Borealis. Usually images of the Aurora Borealis are captured on images as having a very vibrant appearance while in reality, your eyes would see a grey-ish image closer to what you see below. '.
                    '<img src="/upload/northern-1.jpg" class="post-image"> <img src="/upload/northern-2.jpg" class="post-image"> <img src="/upload/northern-3.jpg" class="post-image">',
                'thumbnail_image' => 'northern-1.jpg',
                'posted_at' => '2015-05-18 03:25:43',
                'cashedout_at' => '2015-05-26 03:25:43',
                'total_views' => '200',
                'views_since_payment' => '50',
                'created_at' => '2015-05-15 03:25:43',
                'updated_at' => '2015-05-26 03:25:43',
                'category' => 'photograph'
            ],

            ['id' => 8,
                'user_id' => 2,
                'status' => 'posted',
                'admin_message' => null,
                'title' => 'WIRED\'s beautifully redesigned San Francisco office',
                'slug' => 'post-8',
                'content_type' => 'article',
                'content' => 'Scott Dadich, the editor in chief at WIRED ordered the San Francisco office of the tech news super giant to be redesigned. '.
                                'WIRED hired Gensler to give their office a new, modern look. They followed the approach taken by many Silicon Valley tech companies: open floor plans allowing for easy team communication. '.
                                'Some have critizied these types floor plans. Citing that these plans serve only to reduce costs of cubical walls and increase the amount of distractions that employees are faced with. '.
                                '<img src="/upload/wired-1.jpg" class="post-image">'.
                                '<img src="/upload/wired-2.jpg" class="post-image">'.
                                '<img src="/upload/wired-3.jpg" class="post-image">'.
                                '<img src="/upload/wired-4.jpg" class="post-image">'.
                                'Source at <a href="https://www.trnk-nyc.com/stories/scott-dadich-wired/">TRNK</a>',
                'thumbnail_image' => 'wired-1.jpg',
                'posted_at' => '2015-05-18 03:25:43',
                'cashedout_at' => '2015-05-26 03:25:43',
                'total_views' => '200',
                'views_since_payment' => '50',
                'created_at' => '2015-05-15 03:25:43',
                'updated_at' => '2015-05-26 03:25:43',
                'category' => 'photograph'
            ],

            ['id' => 9,
                'user_id' => 2,
                'status' => 'posted',
                'admin_message' => null,
                'title' => 'Post 9',
                'slug' => 'post-9',
                'content_type' => 'article',
                'content' => 'Content for post 9',
                'thumbnail_image' => 'northern-1.jpg',
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