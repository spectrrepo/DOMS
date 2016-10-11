<?php

use Illuminate\Database\Seeder;

class TagsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Tags')->delete();

        $data = array(
            array(
                'id' => '1',
                'post_id' => '1',
                'title' => 'test-1',
            ),
            array(
                'id' => '2',
                'post_id' => '2',
                'title' => 'test-2',
            ),
            array(
                'id' => '3',
                'post_id' => '3',
                'title' => 'test-3',
            ),
            array(
                'id' => '4',
                'post_id' => '4',
                'title' => 'test-4',
            ),
        );

        DB::table('Tags')->insert($data);
    }
}
