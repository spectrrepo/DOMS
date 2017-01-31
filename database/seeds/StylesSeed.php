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
                'name' => 'Авангард',
                'description' => 'saifhaskjhflkashflks',
            
                'alt_text' => 'sl;faskfd;lsa'
            ),
            array(
                'id' => '2',
                'name' => 'Ампир',
                'description' => 'saifhaskjhflkashflks',
                
                'alt_text' => 'sl;faskfd;lsa'
            ),
            array(
                'id' => '3',
                'name' => 'Арт-деко',
                'description' => 'saifhaskjhflkashflks',
               
                'alt_text' => 'sl;faskfd;lsa'
            ),
            array(
                'id' => '4',
                'name' => 'Барокко',
                'description' => 'saifhaskjhflkashflks',
              
                'alt_text' => 'sl;faskfd;lsa'
            ),
            array(
                'id' => '5',
                'name' => 'Брутализм',
                'description' => 'saifhaskjhflkashflks',
             
                'alt_text' => 'sl;faskfd;lsa'
            ),
            array(
                'id' => '6',
                'name' => 'Викторианский',
                'description' => 'saifhaskjhflkashflks',
            
                'alt_text' => 'sl;faskfd;lsa'
            ),
            array(
                'id' => '7',
                'name' => 'Готика',
                'description' => 'saifhaskjhflkashflks',
               
                'alt_text' => 'sl;faskfd;lsa'
            ),
            array(
                'id' => '8',
                'name' => 'Гранж',
                'description' => 'saifhaskjhflkashflks',
              
                'alt_text' => 'sl;faskfd;lsa'
            ),
            array(
                'id' => '9',
                'name' => 'Кантри',
                'description' => 'saifhaskjhflkashflks',
             
                'alt_text' => 'sl;faskfd;lsa'
            ),
            array(
                'id' => '10',
                'name' => 'Китч',
                'description' => 'saifhaskjhflkashflks',
            
                'alt_text' => 'sl;faskfd;lsa'
            ),
            array(
                'id' => '11',
                'name' => 'Классицизм',
                'description' => 'saifhaskjhflkashflks',
              
                'alt_text' => 'sl;faskfd;lsa'
            ),
            array(
                'id' => '12',
                'name' => 'Конструктивизм',
                'description' => 'saifhaskjhflkashflks',
         
                'alt_text' => 'sl;faskfd;lsa'
            ),
            array(
                'id' => '13',
                'name' => 'Ле Корбюзье',
                'description' => 'saifhaskjhflkashflks',
        
                'alt_text' => 'sl;faskfd;lsa'
            ),
            array(
                'id' => '14',
                'name' => 'Лофт',
                'description' => 'saifhaskjhflkashflks',
       
                'alt_text' => 'sl;faskfd;lsa'
            ),
            array(
                'id' => '15',
                'name' => 'Марокканский',
                'description' => 'saifhaskjhflkashflks',
               
                'alt_text' => 'sl;faskfd;lsa'
            ),
            array(
                'id' => '16',
                'name' => 'Минимализм',
                'description' => 'saifhaskjhflkashflks',
              
                'alt_text' => 'sl;faskfd;lsa'
            ),
            array(
                'id' => '17',
                'name' => 'Модерн',
                'description' => 'saifhaskjhflkashflks',
             
                'alt_text' => 'sl;faskfd;lsa'
            ),
            array(
                'id' => '18',
                'name' => 'Неоклассицизм',
                'description' => 'saifhaskjhflkashflks',
               
                'alt_text' => 'sl;faskfd;lsa'
            ),
            array(
                'id' => '19',
                'name' => 'Поп-арт',
                'description' => 'saifhaskjhflkashflks',
               
                'alt_text' => 'sl;faskfd;lsa'
            ),
            array(
                'id' => '20',
                'name' => 'Постмодернизм',
                'description' => 'saifhaskjhflkashflks',
              
                'alt_text' => 'sl;faskfd;lsa'
            ),
            array(
                'id' => '21',
                'name' => 'Ренесанс',
                'description' => 'saifhaskjhflkashflks',
          
                'alt_text' => 'sl;faskfd;lsa'
            ),
            array(
                'id' => '22',
                'name' => 'Рококо',
                'description' => 'saifhaskjhflkashflks',
                
                'alt_text' => 'sl;faskfd;lsa'
            ),
            array(
                'id' => '23',
                'name' => 'Романский',
                'description' => 'saifhaskjhflkashflks',
               
                'alt_text' => 'sl;faskfd;lsa'
            ),
            array(
                'id' => '24',
                'name' => 'Скандинавский',
                'description' => 'saifhaskjhflkashflks',
                
                'alt_text' => 'sl;faskfd;lsa'
            ),array(
                'id' => '25',
                'name' => 'Средиземноморский',
                'description' => 'saifhaskjhflkashflks',
                
                'alt_text' => 'sl;faskfd;lsa'
            ),
            array(
                'id' => '26',
                'name' => 'Фьюжн',
                'description' => 'saifhaskjhflkashflks',
               
                'alt_text' => 'sl;faskfd;lsa'
            ),
            array(
                'id' => '27',
                'name' => 'Хай-тек',
                'description' => 'saifhaskjhflkashflks',
                
                'alt_text' => 'sl;faskfd;lsa'
            ),
            array(
                'id' => '28',
                'name' => 'Эклектика',
                'description' => 'saifhaskjhflkashflks',
               
                'alt_text' => 'sl;faskfd;lsa'
            ),
            array(
                'id' => '29',
                'name' => 'Эко',
                'description' => 'saifhaskjhflkashflks',
                
                'alt_text' => 'sl;faskfd;lsa'
            ),
            array(
                'id' => '30',
                'name' => 'Экспрессионизм',
                'description' => 'saifhaskjhflkashflks',
               
                'alt_text' => 'sl;faskfd;lsa'
            ),
            array(
                'id' => '31',
                'name' => 'Этнический',
                'description' => 'saifhaskjhflkashflks',
             
               'alt_text' => 'sl;faskfd;lsa'
            ),
            array(
                'id' => '32',
                'name' => 'Японский',
                'description' => 'saifhaskjhflkashflks',
              
                'alt_text' => 'sl;faskfd;lsa'
            )
        );

        DB::table('Styles')->insert($data);
    }
}
