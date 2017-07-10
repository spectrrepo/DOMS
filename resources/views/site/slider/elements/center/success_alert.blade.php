@if (Session::get('check') == 'true')
  <div class="uk-alert uk-alert-success" data-uk-alert=""style="display: block;width: 72%;margin-bottom: 27px;">
    <a href="" class="uk-alert-close uk-close"></a>
    <p>Пароль успешно отправлен на адрес электронной почты: {{ Auth::user()->email }}</p>
  </div>
@endif
