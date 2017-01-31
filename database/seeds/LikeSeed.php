<?php

use Illuminate\Database\Seeder;

class LikeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Likes')->delete();

        $data = array(
            array(
                'id' => '1',
                'post_id' => '1',
                'user_id' => '1',
                'date' => '98-12-31 11:30:45',
            ),
            array(
                'id' => '2',
                'post_id' => '2',
                'user_id' => '2',
                'date' => '98-12-31 08:30:45',
            ),
            array(
                'id' => '3',
                'post_id' => '3',
                'user_id' => '3',
                'date' => '98-12-31 10:30:45',
            ),
            array(
                'id' => '4',
                'post_id' => '4',
                'user_id' => '4',
                'date' => '98-12-31 12:30:45',
            )
        );

        DB::table('Likes')->insert($data);

    }
}
