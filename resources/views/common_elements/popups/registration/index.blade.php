<div class="overlay" id="popup-registr" {{Session::has('reg') ? 'style=display:block;' : ''}}>
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
    {{ Form::open(array('id'=>'registr', 'url' => route('registration'))) }}
    <div class="b-form-inputs">
      <span class="title-text bottom-line">Или зарегистрироваться через адрес электронной почты</span>
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
      @include('common_elements.popups.registration.input_form')
    </div>
    <div class="b-choose-status">
      <span class="title-reg">Статус пользователя</span>
      <div class="clear"></div>
      @include('common_elements.popups.registration.status')
      <div class="clear"></div>
    </div>
    <input class="registr-submit" type="submit" value="ЗАРЕГИСТРИРОВАТЬСЯ">
  </div>
</div>
