<?php

use Illuminate\Database\Seeder;

class SectionTableSeederUser2 extends Seeder {

    public function run()
    {
        $sections = array(
            ['id' => 1,
                'post_id' => 5,
                'type' => 'section-text',
                'optional_content' => '',
                'content' => 'American Standard has created these beautiful 3D printed faucets. The faucets are created by way of a computer guided laser which fuses powered metal into these incredible shapes. These faucets are expected to begin to ready for production by June 2016.'
            ],
            ['id' => 2,
                'post_id' => 5,
                'type' => 'section-text',
                'optional_content' => '',
                'content' => '<i>The [SLS] process democratizes design and decentralizes manufacturing, which will eventually upend the design and construction industry, along with many others. A new, more efficient business model for bespoke design could be on the horizon. This would reduce the inventory pressures that arise from mass production of personalized products, while opening up a new world for both design and construction. -American Standard</i>'
            ],
            ['id' => 3,
                'post_id' => 5,
                'type' => 'section-image',
                'optional_content' => '',
                'content' => 'sink-1.jpg'
            ],
            ['id' => 4,
                'post_id' => 5,
                'type' => 'section-image',
                'optional_content' => '',
                'content' => 'sink-2.jpg'
            ],
            ['id' => 5,
                'post_id' => 5,
                'type' => 'section-image',
                'optional_content' => '',
                'content' => 'sink-3.jpg'
            ],
            ['id' => 6,
                'post_id' => 5,
                'type' => 'section-image',
                'optional_content' => '',
                'content' => 'sink-4.jpg'
            ],
            ['id' => 7,
                'post_id' => 5,
                'type' => 'section-image',
                'optional_content' => '',
                'content' => 'sink-5.jpg'
            ],

            ['id' => 8,
                'post_id' => 6,
                'type' => 'section-text',
                'optional_content' => '',
                'content' => 'Cinemagraphs are animated images created by looping a video such that it cycles perfectly without seam between last frame and first frame. Additionally, to be considered a cinemagraph, every frame of the animation must be able to stand on it\'s own as a still frame image. Artists have created cinemagraphs from scenes from movies, self-shot videos, and even pixel art.'
            ],
            ['id' => 9,
                'post_id' => 6,
                'type' => 'section-listnumber',
                'optional_content' => '',
                'content' => ''
            ],
            ['id' => 81,
                'post_id' => 6,
                'type' => 'section-image',
                'optional_content' => 'http://www.reddit.com/user/relevant__comment',
                'content' => 'cinemagraph-1.gif'
            ],
            ['id' => 82,
                'post_id' => 6,
                'type' => 'section-listnumber',
                'optional_content' => '',
                'content' => ''
            ],
            ['id' => 83,
                'post_id' => 6,
                'type' => 'section-image',
                'optional_content' => 'http://bonvallet.deviantart.com',
                'content' => 'cinemagraph-2.gif'
            ],
            ['id' => 84,
                'post_id' => 6,
                'type' => 'section-listnumber',
                'optional_content' => '',
                'content' => ''
            ],
            ['id' => 85,
                'post_id' => 6,
                'type' => 'section-image',
                'optional_content' => '',
                'content' => 'cinemagraph-3.gif'
            ],
            ['id' => 86,
                'post_id' => 6,
                'type' => 'section-listnumber',
                'optional_content' => '',
                'content' => ''
            ],
            ['id' => 87,
                'post_id' => 6,
                'type' => 'section-image',
                'optional_content' => '',
                'content' => 'cinemagraph-4.gif'
            ],
            ['id' => 88,
                'post_id' => 6,
                'type' => 'section-listnumber',
                'optional_content' => '',
                'content' => ''
            ],
            ['id' => 89,
                'post_id' => 6,
                'type' => 'section-image',
                'optional_content' => '',
                'content' => 'cinemagraph-5.gif'
            ],



            ['id' => 10,
                'post_id' => 7,
                'type' => 'section-text',
                'optional_content' => '',
                'content' => 'These white Northern Lights appeared in Finland. The Northern Lights are a beautiful display caused by emissions from the sun hitting the Earth\'s atmosphere. These images reveal a fairly common display of the Aurora Borealis. Usually images of the Aurora Borealis are captured on images as having a very vibrant appearance while in reality, your eyes would see a grey-ish image closer to what you see below.'
            ],
            ['id' => 11,
                'post_id' => 7,
                'type' => 'section-image',
                'optional_content' => '',
                'content' => 'northern-1.jpg'
            ],
            ['id' => 12,
                'post_id' => 7,
                'type' => 'section-image',
                'optional_content' => '',
                'content' => 'northern-2.jpg'
            ],
            ['id' => 13,
                'post_id' => 7,
                'type' => 'section-image',
                'optional_content' => '',
                'content' => 'northern-3.jpg'
            ],
            ['id' => 14,
                'post_id' => 8,
                'type' => 'section-text',
                'optional_content' => '',
                'content' => 'Scott Dadich, the editor in chief at WIRED ordered the San Francisco office of the tech news super giant to be redesigned. <br><br>WIRED hired Gensler to give their office a new, modern look. They followed the approach taken by many Silicon Valley tech companies: open floor plans allowing for easy team communication. Some have critizied these types floor plans. Citing that these plans serve only to reduce costs of cubical walls and increase the amount of distractions that employees are faced with.'
            ],
            ['id' => 15,
                'post_id' => 8,
                'type' => 'section-image',
                'optional_content' => '',
                'content' => 'wired-1.jpg'
            ],
            ['id' => 16,
                'post_id' => 8,
                'type' => 'section-image',
                'optional_content' => '',
                'content' => 'wired-2.jpg'
            ],
            ['id' => 17,
                'post_id' => 8,
                'type' => 'section-image',
                'optional_content' => '',
                'content' => 'wired-3.jpg'
            ],
            ['id' => 18,
                'post_id' => 8,
                'type' => 'section-image',
                'optional_content' => '',
                'content' => 'wired-4.jpg'
            ],
            ['id' => 19,
                'post_id' => 8,
                'type' => 'section-source',
                'optional_content' => '',
                'content' => 'https://www.trnk-nyc.com/stories/scott-dadich-wired/'
            ]

        );

        // Uncomment the below to run the seeder
        DB::table('sections')->insert($sections);
    }

}