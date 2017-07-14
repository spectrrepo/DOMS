<div class="overlay" id="login-popup" {{Session::has('login') ? 'style=display:block;' : ''}}>
  <div class="modal modal-login">
     <span class="close uk-icon-justify uk-icon-remove popup-close"></span>
     <span class="title">Авторизация</span>
     <div class="b-soc-log">
        <a href="/socialite/facebook" class="uk-icon-justify uk-icon-facebook-f fb"></a>
        <a href="/social_login/vkontakte"class="uk-icon-justify uk-icon-vk vk"></a>
        <div class="clear"></div>
     </div>
      @if ($errors->any())
          <div class="uk-alert uk-alert-danger uk-width-1-1" data-uk-alert=""style="display: block;">
              <a href="" class="uk-alert-close uk-close"></a>
              @foreach ($errors->all() as $error)
                  <ul style="margin-left: 12px;" class="uk-list">
                      <li>{{ $error }}</li>
                  </ul>
              @endforeach
          </div>
      @endif
      @if (Session::has('login'))
          <div class="uk-alert uk-alert-danger uk-width-1-1" data-uk-alert=""style="display: block;">
              <a href="" class="uk-alert-close uk-close"></a>
                  <ul style="margin-left: 12px;" class="uk-list">
                      <li>Пользователя с таким логином и паролем не существует</li>
                  </ul>
          </div>
      @endif
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
