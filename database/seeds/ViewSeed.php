<?php

use Illuminate\Database\Seeder;

class ViewSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Views')->delete();

        $data = array(
            array(
                'id' => '1',
                'path_min' => 'qwdsalmfl',
                'path_full' => 'asf;lasl;fa;sf',
                'alt_text' => 'asald,s',
                'post_id' => '1',
                'user_id' => '1',
                'date' => '98-12-31 11:30:45'
            ),
            array(
                'id' => '2',
                'path_min' => 'qwdsalmfl',
                'path_full' => 'asf;lasl;fa;sf',
                'alt_text' => 'asald,s',
                'post_id' => '2',
                'user_id' => '2',
                'date' => '98-12-31 11:30:45'
            ),
            array(
                'id' => '3',
                'path_min' => 'qwdsalmfl',
                'path_full' => 'asf;lasl;fa;sf',
                'alt_text' => 'asald,s',
                'post_id' => '3',
                'user_id' => '3',
                'date' => '98-12-31 11:30:45'
            ),
            array(
                'id' => '4',
                'path_min' => 'qwdsalmfl',
                'path_full' => 'asf;lasl;fa;sf',
                'alt_text' => 'asald,s',
                'post_id' => '4',
                'user_id' => '4',
                'date' => '98-12-31 11:30:45'
            )
        );

        DB::table('Views')->insert($data);
    }
}
