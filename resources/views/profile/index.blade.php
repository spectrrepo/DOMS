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
              <span class="contact-item-value"> {{ $user->e_mail }} </span>
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
        <li class="item-swicher{{ substr_count(URL::current(), '/profile/') ? ' item-switcher-active': ' none' }}"><a href="{{ URL::to('/profile/'.Auth::id()) }}">Обновления</a></li>
        <li class="item-swicher{{ substr_count(URL::current(), '/your_photo') ? ' item-switcher-active': ' none' }}"><a href="{{ URL::to('/profile/'.Auth::id().'/your_photo') }}">Фотографии</a></li>
        <div class="clear"></div>
      </ul>
    </div>
    <div class="b-personal-news">
      @foreach ($images as $image)
        <div class="b-person-post">
          <div class="col-news-min">
              <div class="b-portret-blogger"><img src="
                {{ !($image->avatar === null ) ? $image->avatar->url() : '' }}" alt="" /></span></div>
          </div>
          <div class="col-news-big">
              <div class="b-name-redactor"><a href="/profile/{{$image->id}}">{{$image->name}}</a></div>
              <div class="b-post-body">
                <div class="b-photo-post">
                  <img src="{{$image->full_path}}" class="img-post" alt="" />
                </div>
                <div class="b-iformation">
                  <div class="b-date">
                    {{$image->photo_updated_at->format('d M Y')}}
                  </div>
                  <div class="b-statistics">
                    <div class="b-item-stat">
                      <span class="ico uk-icon-justify uk-icon-eye"></span>
                      <span class="num-stat">8</span>
                      <span class="tooltip-stat other-margin-tooltip1">
                        <span class="text-tooltip-stat">
                          количество просмотров
                        </span>
                        <span class="triangle-tooltip-stat"></span>
                      </span>
                    </div>
                    <div class="b-item-stat">
                      <span class="ico uk-icon-justify uk-icon-heart"></span>
                      <span class="num-stat">12</span>
                      <span class="tooltip-stat other-margin-tooltip2">
                        <span class="text-tooltip-stat">
                          понравилось
                        </span>
                        <span class="triangle-tooltip-stat"></span>
                      </span>
                    </div>
                    <div class="b-item-stat">
                      <span class="ico uk-icon-justify uk-icon-star"></span>
                      <span class="num-stat">2</span>
                      <span class="tooltip-stat">
                        <span class="text-tooltip-stat">
                         избранное
                        </span>
                        <span class="triangle-tooltip-stat"></span>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="clear"></div>
              </div>
              <div class="clear"></div>
          </div>
          <div class="clear"></div>
    </div>
    @endforeach
    <div class="clear"></div>
    </div>
</div>
<div class="btn-dwnld-new">
  Загрузить ещё
</div>
</div>
@endsection
