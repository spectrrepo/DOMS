<?php

use Illuminate\Database\Seeder;

class RoomsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Rooms')->delete();

        $data = array(
            array(
                'id' => '1',
                'title' => 'кухня',
            ),
            array(
                'id' => '2',
                'title' => 'прихожая',
            ),
            array(
                'id' => '3',
                'title' => 'ванная',
            ),
            array(
                'id' => '4',
                'title' => 'туалет',
            )
        );

        DB::table('Rooms')->insert($data);
    }
}
