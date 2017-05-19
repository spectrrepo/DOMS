<div class="overlay" id="passwd-popup">
  <div class="modal modal-forget">
     <span class="close uk-icon-justify uk-icon-remove popup-close"></span>
     <span class="recover-title">Восстановление пароля</span>
     <p class="recover-text">
        Введите адрес электронной почты Вашего аккаунта
     </p>
     {{ Form::open(array('id' => 'recovery-pass','url' => '/recovery_pass')) }}
        <input class="recover-text-inp" type="text" name="e_mail" required value="">
        <button class="recover-submit uk-icon-justify uk-icon-reply" type="submit" name="name"></button>
     {{ Form::close() }}
     <div class="clear"> </div>
  </div>
</div>
