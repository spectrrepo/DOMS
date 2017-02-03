<?php

use Illuminate\Database\Seeder;
use \UsersRole;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new UsersRole();
        $role->run();
    }
}
