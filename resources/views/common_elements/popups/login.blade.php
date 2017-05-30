<div class="overlay" id="login-popup">
  <div class="modal modal-login">
     <span class="close uk-icon-justify uk-icon-remove popup-close"></span>
     <span class="title">Авторизация</span>
     <div class="b-soc-log">
        <a href="/socialite/facebook" class="uk-icon-justify uk-icon-facebook-f fb"></a>
        <a href="/social_login/vkontakte"class="uk-icon-justify uk-icon-vk vk"></a>
        <div class="clear"></div>
     </div>
     <div class="clear"></div>
     {{ Form::open(array('id'=> 'enter','url' => url('login')))}}
        <input class="modal-login-inp" type="text" required name="email" placeholder="E-mail">
        <input class="modal-login-inp" type="password" required name="password" placeholder="Пароль">
        <a id="recover-pswd">
          <span  class="forget-link">Забыли пароль?</span>
        </a>
        <input class="modal-login-sbmt" type="submit" name="name" value="Войти">
     {{ Form::close()}}
     <div class="clear"></div>
   </div>
 </div>
