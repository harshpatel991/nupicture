<?php

use Illuminate\Database\Seeder;

class SectionTableSeederUser1 extends Seeder {

    public function run()
    {
        $sections = array(
            ['id' => 20,
                'post_id' => 3,
                'type' => 'section-text',
                'optional_content' => '',
                'content' => 'This beautiful monster can found in Barcelona, Spain. It was assembled inside of a former chapel. Named after "Mare Nostrum", the Roman name for the Mediterranean Sea.'
            ],
            ['id' => 21,
                'post_id' => 3,
                'type' => 'section-image',
                'optional_content' => '',
                'content' => 'super-computer-1.jpg'
            ],
            ['id' => 22,
                'post_id' => 3,
                'type' => 'section-text',
                'optional_content' => '',
                'content' => 'The setup has been updated multiple times throughout it\'s 10 year history. Currently, it features 48,896 Intel Sandy Bridge processors. In each of it\'s 36 racks, there are a total of a total of 1,344 cores and 2,688GB of memory. Unfortunately, you won\'t be able play many games on it as it runs on sSUSE Linux. <br><br>The supercomputer is primarily used for reasearch: genomes, protiens and weather simulations.'
            ],
            ['id' => 90,
                'post_id' => 3,
                'type' => 'section-image',
                'optional_content' => '',
                'content' => 'super-computer-2.jpg'
            ],
            ['id' => 91,
                'post_id' => 3,
                'type' => 'section-image',
                'optional_content' => '',
                'content' => 'super-computer-3.jpg'
            ],

            ['id' => 92,
                'post_id' => 4,
                'type' => 'section-text',
                'optional_content' => '',
                'content' => 'Father, Tez Gelmir, created this 74-Z Speeder Bike from Star Wars Return of the Jedi for his daughters first birthday. The construction is made from simple plywood, PVC pipes, and plastic mooulded via 3D printing for the curved pieces.'
            ],
            ['id' => 93,
                'post_id' => 4,
                'type' => 'section-text',
                'optional_content' => '',
                'content' => 'He\'s also <a href="http://www.instructables.com/id/Rocking-Speeder-Bike/">posted instructions</a> so you can create your own speeder.'
            ],
            ['id' => 94,
                'post_id' => 4,
                'type' => 'section-image',
                'optional_content' => '',
                'content' => 'star-wars-1.jpg'
            ],
            ['id' => 95,
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