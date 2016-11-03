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
                'title' => 'Гостинная',
            ),
            array(
                'id' => '2',
                'title' => 'Спальня',
            ),
            array(
                'id' => '3',
                'title' => 'Столовая',
            ),
            array(
                'id' => '4',
                'title' => 'Детская комната',
            ),
            array(
                'id' => '5',
                'title' => 'Кабинет, Библиотека',
            ),
            array(
                'id' => '6',
                'title' => 'Холл, Коридор',
            ),
            array(
                'id' => '7',
                'title' => 'Кухня',
            ),
            array(
                'id' => '8',
                'title' => 'Веранда, Лоджия',
            ),
            array(
                'id' => '9',
                'title' => 'Домашний кинотеатр',
            ),
            array(
                'id' => '10',
                'title' => 'Бильярдная',
            ),
            array(
                'id' => '11',
                'title' => 'Гардеробная',
            ),
            array(
                'id' => '12',
                'title' => 'Подсобные помещения',
            ),
            array(
                'id' => '13',
                'title' => 'Ванная комната',
            ),
            array(
                'id' => '14',
                'title' => 'Cанузел',
            ),
            array(
                'id' => '15',
                'title' => 'Малогабаритка',
            ),
            array(
                'id' => '16',
                'title' => 'Прочее',
            )
        );

        DB::table('Rooms')->insert($data);
    }
}
