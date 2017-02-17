<div class="wrap-personal-information">
  @if (Session::get('check') == 'true')
    <div class="uk-alert uk-alert-success" data-uk-alert=""style="display: block;">
      <a href="" class="uk-alert-close uk-close"></a>
      <p>Фото добавлено</p>
    </div>
  @elseif (Session::get('check') == 'delete')
    <div class="uk-alert uk-alert-success" data-uk-alert=""style="display: block;">
      <a href="" class="uk-alert-close uk-close"></a>
      <p>Фото успешно удалено</p>
    </div>
  @endif
    <div class="b-photo-person">
          <img src="{{ empty($user->quadro_ava) ? '/img/user.png' : $user->quadro_ava }}" alt="" />
    </div>
    <div class="b-persobal-information">
        <div class="b-name-person">
          {{ $user->name }}
        </div>
        <div class="b-role-person">
          {{ $user->status }}
        </div>
        <div class="b-about-person">
          <pre>
            {{ $user->about }}
          </pre>
        </div>
        <div class="b-contact-data">
          <div class="contact-item">
              <span class="contact-item-name">email</span>
              <a href="mailto:{{ $user->email }}" class="contact-item-value"> {{ $user->email }} </a>
              <div class="clear"></div>
          </div>
          <div class="contact-item">
              <span class="contact-item-name">skype</span>
              <a  href="skype:{{ $user->email }}" class="contact-item-value"> {{ $user->skype }} </a>
              <div class="clear"></div>
          </div>
          <div class="contact-item">
              <span class="contact-item-name">телефон</span>
              <a href="tellto:{{ $user->email }}" class="contact-item-value"> {{ $user->phone }} </a>
              <div class="clear"></div>
          </div>
          <div class="contact-item">
              <span class="contact-item-name">соц.<br>сети</span>
              <span class="contact-item-value">
                @foreach ($links as $link_item)
                  <a href="http://{{ $link_item->link }}" class="item-links uk-icon-external-link"></a>
                @endforeach
              </span>
              <div class="clear"></div>
          </div>
        </div>
    </div>
</div>
