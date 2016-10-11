<?php

use Illuminate\Database\Seeder;

class MessagesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Messages')->delete();

        $data = array(
            array(
                'id' => '1',
                'sender_id' => '1',
                'recepient_id' => '1',
                'text' => 'qwqwdasdwa',
                'date' => '98-12-31 14:30:45'
            ),
            array(
                'id' => '2',
                'sender_id' => '2',
                'recepient_id' => '2',
                'text' => 'qwq2rwe24rwdasdwa',
                'date' => '98-12-31 18:30:45'
            ),
            array(
                'id' => '3',
                'sender_id' => '3',
                'recepient_id' => '3',
                'text' => 'qw213123qwdasdwa',
                'date' => '98-12-31 13:30:45'
            ),
            array(
                'id' => '4',
                'sender_id' => '4',
                'recepient_id' => '4',
                'text' => 'qasdasdsadwqwdasdwa',
                'date' => '98-12-31 04:30:45'
            )
        );

        DB::table('Messages')->insert($data);
    }
}
