<?php

use Illuminate\Database\Seeder;

class StatusProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_description')->delete();

        $data = [
            [
                'id'       => '1',
                'nickname' => 'user',
                'img'      => '/img/item-status-reg/item-reg.png',
                'name'     => 'Пользователь',
                'text'     => 'Я хочу работать с самой большой базой идей
                               для интерьеров, а также добавлять свои
                               интерьеры, общаться с дизайнерами, искать
                               прикольные товары'
            ],
            [
                'id'       => '2',
                'nickname' => 'master',
                'img'      => '/img/item-status-reg/item-reg-2.png',
                'name'     => 'Мастер',
                'text'     => 'Я могу оказывать услуги по воплощению идей
                               оформления интерьеров в жизнь и хочу искать
                               заказчиков с помощью сайта'

            ],
            [
                'id'       => '3',
                'nickname' => 'designer',
                'img'      => '/img/item-status-reg/item-reg-3.png',
                'name'     => 'Дизайнер',
                'text'     => 'Я хочу делиться своими идеями по оформлению
                               интерьеров и искать заказчиков с помощью
                               сайта'

            ],
            [
                'id'       => '4',
                'nickname' => 'shop',
                'img'      => '/img/item-status-reg/item-reg-4.png',
                'name'     => 'Магазин',
                'text'     => 'Я хочу продавать свои товары для интерьеров
                               с помощью сайта'

            ],
        ];

        DB::table('status_description')->insert($data);

    }
}
