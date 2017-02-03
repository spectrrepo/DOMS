<?php

use Illuminate\Database\Seeder;

class UsersRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->delete();

        $data = array(
            array(
                'id' => '1',
                'name' => 'admin'
            ),
            array(
                'id' => '2',
                'name' => 'moderator'
            ),
            array(
                'id' => '3',
                'name' => 'user'
            )
        );

        DB::table('roles')->insert($data);

    }
}
