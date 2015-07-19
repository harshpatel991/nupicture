<?php

use Illuminate\Database\Seeder;

class SectionTableSeederUser1 extends Seeder {

    public function run()
    {
        $sections = array(
            ['id' => 20,
            'post_id' => 1,
            'type' => 'section-image',
            'optional_content' => '',
            'content' => 'super-computer-1.jpg'
            ],
            ['id' => 21,
                'post_id' => 4,
                'type' => 'section-image',
                'optional_content' => '',
                'content' => 'street-art.jpg'
            ],
            ['id' => 22,
                'post_id' => 4,
                'type' => 'section-source',
                'optional_content' => '',
                'content' => 'http://www.reddit.com/user/CrimsonLiquid'
            ]



        );

        // Uncomment the below to run the seeder
        DB::table('sections')->insert($sections);
    }

}