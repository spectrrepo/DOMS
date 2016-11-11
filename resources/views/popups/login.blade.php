<div class="overlay" id="login-popup">
  <div class="modal modal-login">
    <span class="close uk-icon-justify uk-icon-remove"></span>
    <span class="title">Авторизация</span>
    <div class="b-soc-log">
      <span class="uk-icon-justify uk-icon-facebook-f fb"></span>
      <span class="uk-icon-justify uk-icon-vk vk"></span>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
    {{ Form::open()}}
    <input class="modal-login-inp" type="text" name="name" placeholder="E-mail">
    <input class="modal-login-inp" type="password" name="name" placeholder="Пароль">
    <a href="#">
      <span  class="forget-link">Забыли пароль?</span>
    </a>
    <input class="modal-login-sbmt" type="submit" name="name" value="Войти">
    {{ Form::close()}}
    <div class="clear"></div>
    </div>
  </div>
</div>
