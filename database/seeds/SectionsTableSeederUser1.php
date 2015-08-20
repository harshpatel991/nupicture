<?php

use Illuminate\Database\Seeder;

class SectionTableSeederUser1 extends Seeder {

    public function run()
    {
        $sections = array(
            ['id' => 20,
                'post_id' => 3,
                'type' => 'section-image',
                'optional_content' => '',
                'content' => 'super-computer-1.jpg'
            ],
            ['id' => 21,
                'post_id' => 4,
                'type' => 'section-text',
                'optional_content' => '',
                'content' => 'Father, Tez Gelmir, created this 74-Z Speeder Bike from Star Wars Return of the Jedi for his daughters first birthday. The construction is made from simple plywood, PVC pipes, and plastic mooulded via 3D printing for the curved pieces.'
            ],

            ['id' => 22,
                'post_id' => 4,
                'type' => 'section-text',
                'optional_content' => '',
                'content' => 'He\'s also <a href="http://www.instructables.com/id/Rocking-Speeder-Bike/">posted instructions</a> so you can create your own speeder.'
            ],


            ['id' => 90,
                'post_id' => 4,
                'type' => 'section-image',
                'optional_content' => '',
                'content' => 'star-wars-1.jpg'
            ],
            ['id' => 91,
                'post_id' => 4,
                'type' => 'section-youtube',
                'optional_content' => '',
                'content' => 'NkL7DrGZtAg'
            ]

        );

        // Uncomment the below to run the seeder
        DB::table('sections')->insert($sections);
    }

}