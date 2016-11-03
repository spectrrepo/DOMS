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
                'title' => 'бордовый',
                'RGB' => '#660000'
            ),
            array(
                'id' => '2',
                'title' => 'красный',
                'RGB' => '#cc0000'
            ),
            array(
                'id' => '3',
                'title' => 'розовый',
                'RGB' => '#ff66cc'
            ),
            array(
                'id' => '4',
                'title' => 'фиолетовый',
                'RGB' => '#993399'
            ),
            array(
                'id' => '5',
                'title' => 'сиреневый',
                'RGB' => '#663399'
            ),
            array(
                'id' => '6',
                'title' => 'синий',
                'RGB' => '#333399'
            ),
            array(
                'id' => '7',
                'title' => 'бирюзовый',
                'RGB' => '#66cccc'
            ),
            array(
                'id' => '8',
                'title' => 'салатовый',
                'RGB' => '#66cc33'
            ),
            array(
                'id' => '9',
                'title' => 'темно-зеленый',
                'RGB' => '#336600'
            ),
            array(
                'id' => '10',
                'title' => 'желтый',
                'RGB' => '#999900'
            ),
            array(
                'id' => '11',
                'title' => 'рыжий',
                'RGB' => '#ff6600'
            ),
            array(
                'id' => '12',
                'title' => 'темножелтый',
                'RGB' => '#ffcc00'
            ),
            array(
                'id' => '13',
                'title' => 'коричневый',
                'RGB' => '#663300'
            ),
            array(
                'id' => '14',
                'title' => 'черный',
                'RGB' => '#000000'
            ),
            array(
                'id' => '15',
                'title' => 'серый',
                'RGB' => '#999999'
            ),
            array(
                'id' => '16',
                'title' => 'белый',
                'RGB' => '#ffffff'
            )
        );

        DB::table('Colors')->insert($data);
    }
}
