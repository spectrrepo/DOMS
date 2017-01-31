<?php

use Illuminate\Database\Seeder;

class PhotoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Images')->delete();

        $data = array(
            array(
                'id' => '1',
                'title' => 'фотокарточка',
                'description' => 'красивая фотокарточка',
                'path_full' => '12цвй',
                'path_min' => 'qweqwe',
                'author_id' => '1',
                'user_upload_id' => '1',
                'colors' => '2dsads',
                'variants' => '12wqdwa',
                'style' => '12wedwqdaa',
                'rooms' => '12easd',
                'update_to' => '98-12-31 14:20:45',
                'create_to' => '98-12-31 14:20:45'
            ),
            array(
                'id' => '2',
                'title' => 'фотокарточка',
                'description' => 'красивая фотокарточка',
                'path_full' => '12цвй',
                'path_min' => 'qweqwe',
                'author_id' => '1',
                'user_upload_id' => '1',
                'colors' => '2dsads',
                'variants' => '12wqdwa',
                'style' => '12wedwqdaa',
                'rooms' => '12easd',
                'update_to' => '98-12-31 14:20:45',
                'create_to' => '98-12-31 14:20:45'
            ),
            array(
                'id' => '3',
                'title' => 'фотокарточка',
                'description' => 'красивая фотокарточка',
                'path_full' => '12цвй',
                'path_min' => 'qweqwe',
                'author_id' => '1',
                'user_upload_id' => '1',
                'colors' => '2dsads',
                'variants' => '12wqdwa',
                'style' => '12wedwqdaa',
                'rooms' => '12easd',
                'update_to' => '98-12-31 14:20:45',
                'create_to' => '98-12-31 14:20:45'
            ),
            array(
                'id' => '4',
                'title' => 'фотокарточка',
                'description' => 'красивая фотокарточка',
                'path_full' => '12цвй',
                'path_min' => 'qweqwe',
                'author_id' => '1',
                'user_upload_id' => '1',
                'colors' => '2dsads',
                'variants' => '12wqdwa',
                'style' => '12wedwqdaa',
                'rooms' => '12easd',
                'update_to' => '98-12-31 14:20:45',
                'create_to' => '98-12-31 14:20:45'
            )
        );

        DB::table('Images')->insert($data);
    }
}
