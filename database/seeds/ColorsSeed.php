<?php

use Illuminate\Database\Seeder;

class ColorsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Colors')->delete();

        $data = array(
            array(
                'id' => '1',
                'title' => 'test-1',
                'RGB' => '#000000'
            ),
            array(
                'id' => '2',
                'title' => 'test-2',
                'RGB' => '#304212'
            ),
            array(
                'id' => '3',
                'title' => 'test-3',
                'RGB' => '#841350'
            ),
            array(
                'id' => '4',
                'title' => 'test-4',
                'RGB' => '#001360'
            )
        );

        DB::table('Colors')->insert($data);
    }
}
