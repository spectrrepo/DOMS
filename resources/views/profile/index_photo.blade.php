@extends('layouts.profile')
@section('profile-content')

<div class="wrap-personal-information">
    <div class="b-photo-person">
        <img src=" {{ $user->avatar->url('max') }} " alt="user_{{ $user->id }} " />
    </div>
    <div class="b-persobal-information">
        <div class="b-name-person">
          {{ $user->name }}
        </div>
        <div class="b-role-person">
          {{ $user->status }}
        </div>
        <div class="b-about-person">
          fdjgfsdjgl
        </div>
        <div class="b-contact-data">
          <div class="contact-item">
              <span class="contact-item-name">email</span>
              <span class="contact-item-value"> {{$user->e_mail}} </span>
              <div class="clear"></div>
          </div>
          <div class="contact-item">
              <span class="contact-item-name">skype</span>
              <span class="contact-item-value"> {{ $user->skype }} </span>
              <div class="clear"></div>
          </div>
          <div class="contact-item">
              <span class="contact-item-name">телефон</span>
              <span class="contact-item-value"> {{ $user->phone }} </span>
              <div class="clear"></div>
          </div>
          <div class="contact-item">
              <span class="contact-item-name">соц.сети</span>
              <span class="contact-item-value"> {{ $user->soc_net }} </span>
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
    <div class="b-personal-news">


      @if ((empty($userImages)))
      <div class="content  content-your-photo uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 tm-grid-heights" data-uk-grid>
          @foreach ($userImages as $userImage)
              <a href="/photo/{{ $userImage->id }}" class="item-gallery" data-grid-prepared="true"style="position:absolute;">
                <div class="uk-panel-box" >
                    <img src="{{ $userImage->photo->url('small') }}" alt="" />
                </div>
            </a>
          @endforeach
      </div>
      @else
        <div class="content  content-your-photo">
            <h4>Нет фотографий</h4>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>

      @endif
</div>
<div class="btn-dwnld-new content-your-photo">
  Загрузить ещё
</div>
</div>
@endsection
