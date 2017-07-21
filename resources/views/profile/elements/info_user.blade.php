<div class="wrap-personal-information">
    @if (Session::has('message'))
        <div class="uk-alert uk-alert-success" data-uk-alert=""style="display: block;">
            <a href="" class="uk-alert-close uk-close"></a>
            <p>{{ Session::get('message') }}</p>
        </div>
    @endif
    <div class="b-photo-person">
          <img src="{{ empty($user->img_square) ? '/img/user.png' : Storage::url($user->img_large) }}" alt="" />
    </div>
    <div class="b-persobal-information">
        <div class="b-name-person">
          {{ $user->name }}
        </div>
        <div class="b-role-person">
            {{ $user->roles[0]->name }}
        </div>
        <div class="b-about-person">
            {{ $user->about }}
        </div>
        <div class="b-contact-data">
          <div class="contact-item">
              <span class="contact-item-name">email</span>
              <a href="mailto:{{ $user->email }}" class="contact-item-value"> {{ $user->email }} </a>
              <div class="clear"></div>
          </div>
          <div class="contact-item">
              <span class="contact-item-name">skype</span>
              <a  href="skype:{{ $user->skype }}" class="contact-item-value"> {{ $user->skype }} </a>
              <div class="clear"></div>
          </div>
          <div class="contact-item">
              <span class="contact-item-name">телефон</span>
              <a href="tellto:{{ $user->phone }}" class="contact-item-value"> {{ $user->phone }} </a>
              <div class="clear"></div>
          </div>
          <div class="contact-item">
              <span class="contact-item-name">соц.<br>сети</span>
              <span class="contact-item-value">
                  @if (count($user->userSocials) > 0)
                      @foreach ($user->userSocials as $link)
                         <a href="http://{{ $link->link }}" class="item-links uk-icon-external-link"></a>
                      @endforeach
                  @endif
              </span>
              <div class="clear"></div>
          </div>
        </div>
    </div>
</div>
