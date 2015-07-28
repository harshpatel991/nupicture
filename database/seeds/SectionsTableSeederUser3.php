<?php

use Illuminate\Database\Seeder;

class SectionTableSeederUser3 extends Seeder {

    public function run()
    {
        $sections = array(
            ['id' => 23,
                'post_id' => 12,
                'type' => 'section-text',
                'optional_content' => '',
                'content' => 'Studying at the Stuttgart Media University in Germany, Marcus Sies and Florian Nick have captured amazing 4K footage of the landscape and wildlife of Ireland.'
            ],
            ['id' => 24,
                'post_id' => 12,
                'type' => 'section-youtube',
                'optional_content' => '',
                'content' => 'U3r62Np_pxY'
            ],
            ['id' => 25,
                'post_id' => 12,
                'type' => 'section-text',
                'optional_content' => '',
                'content' => 'The project, titled Eylenda, was shot over two weeks across the landscape of Ireland.'
            ],
            ['id' => 26,
                'post_id' => 12,
                'type' => 'section-image',
                'optional_content' => 'https://vimeo.com/132602913',
                'content' => 'two-students-film-amazing-4k-1.jpg'
            ],
            ['id' => 27,
                'post_id' => 12,
                'type' => 'section-image',
                'optional_content' => 'https://vimeo.com/132602913',
                'content' => 'two-students-film-amazing-4k-2.jpg'
            ],
            ['id' => 28,
                'post_id' => 12,
                'type' => 'section-image',
                'optional_content' => 'https://vimeo.com/132602913',
                'content' => 'two-students-film-amazing-4k-3.jpg'
            ]


        );

        // Uncomment the below to run the seeder
        DB::table('sections')->insert($sections);
    }

}