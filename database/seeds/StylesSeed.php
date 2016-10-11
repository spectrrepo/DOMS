<?php

use Illuminate\Database\Seeder;

class StylesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Styles')->delete();

        $data = array(
            array(
                'id' => '1',
                'name' => 'lsd',
                'description' => 'saifhaskjhflkashflks',
                'photo' => 'aslkfjlasjflksa',
                'alt_text' => 'sl;faskfd;lsa'
            ),
            array(
                'id' => '2',
                'name' => 'lsd',
                'description' => 'saifhaskjhflkashflks',
                'photo' => 'aslkfjlasjflksa',
                'alt_text' => 'sl;faskfd;lsa'
            ),
            array(
                'id' => '3',
                'name' => 'lsd',
                'description' => 'saifhaskjhflkashflks',
                'photo' => 'aslkfjlasjflksa',
                'alt_text' => 'sl;faskfd;lsa'
            ),
            array(
                'id' => '4',
                'name' => 'lsd',
                'description' => 'saifhaskjhflkashflks',
                'photo' => 'aslkfjlasjflksa',
                'alt_text' => 'sl;faskfd;lsa'
            ),
        );

        DB::table('Styles')->insert($data);
    }
}
