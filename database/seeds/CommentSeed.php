<?php

use Illuminate\Database\Seeder;

class CommentSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('Comments')->delete();

        $data = array(
            array(
                'id' => '1',
                'post_id' => '1',
                'user_id' => '1',
                'text_comment' => 'qweqwrsdasfasqw',
                'date' => '98-12-31 11:30:45'
            ),
            array(
                'id' => '2',
                'post_id' => '2',
                'user_id' => '2',
                'text_comment' => 'qwasdasdasdeqwrsdasfasqw',
                'date' => '98-12-31 11:30:46'
            ),
            array(
                'id' => '3',
                'post_id' => '3',
                'user_id' => '3',
                'text_comment' => 'qweqwr123123123sdasfasqw',
                'date' => '98-12-31 11:34:45'
            ),
            array(
                'id' => '4',
                'post_id' => '4',
                'user_id' => '4',
                'text_comment' => '123123qweqwrsdasfasqw',
                'date' => '98-12-31 11:31:45'
            )
        );

        DB::table('Comments')->insert($data);
    }
}
