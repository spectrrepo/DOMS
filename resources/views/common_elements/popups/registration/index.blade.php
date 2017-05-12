<div class="overlay" id="popup-registr">
  <div class="modal modal-reg">
    <span class="close uk-icon-justify uk-icon-remove popup-close"></span>
    <span class="title-reg">Регистрация</span>
    <div class="clear"></div>
    <div class="b-soc-net-login">
      <span class="title-text">Войти через социальные сети</span>
      <a href="/socialite/facebook" class="uk-icon-justify uk-icon-facebook-f fb"></a>
      <a href="/social_login/vkontakte" class="uk-icon-justify uk-icon-vk vk"></a>
      <span class="not-wor-text">
        Не беспокойтесь, мы никогда не сделаем пост без вашего разрешения
      </span>
      <div class="clear"></div>
    </div>
    {{ Form::open(array('id'=>'registr', 'url' => '/reg')) }}
    <div class="b-form-inputs">
      <span class="title-text bottom-line">Или зарегистрироваться через адрес электронной почты</span>
      @if (Session::get('bad_reg') == 'true')
        <p style="color:red">
          Пользователь с таким e-mail уже зарегистрирован на сайте!
        </p>
      @endif
      @include('popups.registration.input_form')
    </div>
    <div class="b-choose-status">
      <span class="title-reg">Статус пользователя</span>
      <div class="clear"></div>
      @include('popups.registration.status')
      <div class="clear"></div>
    </div>
    <input class="registr-submit" type="submit" value="ЗАРЕГИСТРИРОВАТЬСЯ">
  </div>
</div>
