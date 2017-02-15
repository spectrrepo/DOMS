@extends('layouts.profile')
@section('profile-content')
{{-- TODO:вынести общую шапку в отдельный файл --}}
<div class="wrap-personal-information">
  <div class="b-photo-person">
     <img src="{{ empty($user->quadro_ava) ? '/img/user.png' : $user->quadro_ava }}" alt="Автопортрет {{ Auth::user()->id }}" />
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
                @endforeach </span>
              <div class="clear"></div>
          </div>
        </div>
    </div>
</div>
<div class="separate-title">
  Лента
</div>

<div class="wrap-personal-news">
    <div class="b-setting-switcher">
      <ul class="switcher">
        <li class="item-swicher"><a href="{{ URL::to('/profile/'.Auth::id()) }}">Обновления</a></li>
        <li class="item-swicher{{  substr_count(URL::current(), '/your_photo') ? ' item-switcher-active': ' none' }}"><a href="{{ URL::to('/profile/'.Auth::id().'/your_photo') }}">Фотографии</a></li>
        <div class="clear"></div>
      </ul>
    </div>


      @if ((!empty($userImages)))
      <div class=" b-personal-news download-user-place content  content-your-photo uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-5 tm-grid-heights" data-uk-grid>
          @foreach ($userImages as $userImage)
              <a href="/profile/admin/verification/{{ $userImage->id }}" class="item-gallery" style="position:absolute" data-grid-prepared="true">
                <div class="uk-panel-box" >
                    <img src="{{ $userImage->quadro_photo }}" alt="" />
                    <div class="ico-liked">
                      <span class="uk-icon-justify uk-icon-eye"></span>
                      <span>{{ !empty($userImage->views_count) ? $userImage->views_count : '0'}}</span>
                      <span class="uk-icon-justify uk-icon-heart"></span>
                      <span>{{ !empty($userImage->likes_count) ? $userImage->likes_count : '0'}}</span>
                      <span class="uk-icon-justify uk-icon-comments"></span>
                      <span>{{ !empty($userImage->comments_count) ? $userImage->comments_count : '0'}}</span>
                    </div>
                    <div class="clear"></div>
                </div>
            </a>
          @endforeach
          <div class="clear">

          </div>
      </div>
      @else
        <div class="content  content-your-photo">
            <h4>Нет фотографий</h4>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>

      @endif
</div>
@endsection
