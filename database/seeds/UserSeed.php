<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Users')->delete();

        $data = array(
            array(
                'id' => '1',
                'name' => 'Георгий',
                'sex' => 'm',
                'e_mail' => 'ajsdlkasjd',
                'status' => 'asdasd',
                'password' => Hash::make('salkdalsadasd'),
                'skype' => 'asdasd',
                'soc_net' => 'asdasd',
                'portret' => 'asdasda',
                'date_reg' => '98-12-31 11:30:45',
                'date_update' => '98-12-31 11:30:45'
            ),
            array(
                'id' => '2',
                'name' => 'Георгий',
                'sex' => 'm',
                'e_mail' => 'ajsdlkasjd',
                'status' => 'asdasd',
                'password' => Hash::make('salkdalsadasd'),
                'skype' => 'asdasd',
                'soc_net' => 'asdasd',
                'portret' => 'asdasda',
                'date_reg' => '98-12-31 11:30:45',
                'date_update' => '98-12-31 11:30:45'
            ),
            array(
                'id' => '3',
                'name' => 'Георгий',
                'sex' => 'm',
                'e_mail' => 'ajsdlkasjd',
                'status' => 'asdasd',
                'password' => Hash::make('salkdalsadasd'),
                'skype' => 'asdasd',
                'soc_net' => 'asdasd',
                'portret' => 'asdasda',
                'date_reg' => '98-12-31 11:30:45',
                'date_update' => '98-12-31 11:30:45'
            ),
            array(
                'id' => '4',
                'name' => 'Георгий',
                'sex' => 'm',
                'e_mail' => 'ajsdlkasjd',
                'status' => 'asdasd',
                'password' => Hash::make('salkdalsadasd'),
                'skype' => 'asdasd',
                'soc_net' => 'asdasd',
                'portret' => 'asdasda',
                'date_reg' => '98-12-31 11:30:45',
                'date_update' => '98-12-31 11:30:45'
            )
        );

        DB::table('Users')->insert($data);
    }
}
