<?php

use Illuminate\Database\Seeder;


class PayoutsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('payouts')->delete();

        $payouts = array(
            [
                'content_type'  => 'image',
                'base'  => '40',
                'per_view'  => '1',
            ],

            [
                'content_type'  => 'short_text',
                'base'  => '40',
                'per_view'  => '1',
            ],

            [
                'content_type'  => 'image',
                'base'  => '200',
                'per_view'  => '2',
            ],

            [
                'content_type'  => 'article',
                'base'  => '400',
                'per_view'  => '3',
            ]
        );


        DB::table('payouts')->insert($payouts);
    }

}