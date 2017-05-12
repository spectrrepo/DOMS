<?php
  $inputs = [
             '0' => [ 'name'=> 'Имя', 'value'=> 'name' ],
             '1' => [ 'name'=> 'Адрес электронной почты', 'value'=> 'email' ],
             '2' => [ 'name'=> 'Телефон', 'value'=> 'phone' ],
             '3' => [ 'name'=> 'Пароль', 'value'=> 'password']
           ];
?>
@for ($i = 0; $i < 4; $i++)
  <div class="wrap-reg-inp">
    <span class="label">{{ $inputs[$i]['name'] }}</span>
    <input class="input-reg" type="text" name="{{ $inputs[$i]['value'] }}" >
  </div>
@endfor
