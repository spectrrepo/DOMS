@extends('layouts.profile')
@section('profile-content')

<div class="wrap-personal-information">
  @if (session('error') == 'true')
    <div class="uk-alert uk-alert-success" data-uk-alert=""style="display: block;">
      <a href="" class="uk-alert-close uk-close"></a>
      <p>Фото добавлено</p>
    </div>
  @endif
    <div class="b-photo-person" style="background:url({{ $user->avatar->url('max') }}) center no-repeat;
                                       background-size:cover;">
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
              <a href="mailto:{{ $user->e_mail }}" class="contact-item-value"> {{ $user->e_mail }} </a>
              <div class="clear"></div>
          </div>
          <div class="contact-item">
              <span class="contact-item-name">skype</span>
              <a  href="skype:{{ $user->e_mail }}" class="contact-item-value"> {{ $user->skype }} </a>
              <div class="clear"></div>
          </div>
          <div class="contact-item">
              <span class="contact-item-name">телефон</span>
              <a href="tellto:{{ $user->e_mail }}" class="contact-item-value"> {{ $user->phone }} </a>
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
@if ($id != Auth::user()->id)

@else
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
              <div class="b-portret-blogger" style="background:url({{ !($image->path_full === null ) ? $image->path_full : '' }}) center no-repeat;
                                                    background-size: cover;"></div>
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
                      <span class="num-stat">{{ !empty($image->views_count) ? $image->views_count : '0' }}</span>
                      <span class="tooltip-stat other-margin-tooltip1">
                        <span class="text-tooltip-stat">
                          количество просмотров
                        </span>
                        <span class="triangle-tooltip-stat"></span>
                      </span>
                    </div>
                    <div class="b-item-stat">
                      <span class="ico uk-icon-justify uk-icon-heart"></span>
                      <span class="num-stat">{{ !empty($image->likes_count) ? $image->likes_count : '0' }}</span>
                      <span class="tooltip-stat other-margin-tooltip2">
                        <span class="text-tooltip-stat">
                          понравилось
                        </span>
                        <span class="triangle-tooltip-stat"></span>
                      </span>
                    </div>
                    <div class="b-item-stat">
                      <span class="ico uk-icon-justify uk-icon-star"></span>
                      <span class="num-stat">{{ !empty($image->likes_count) ? $image->likes_count : '0' }}</span>
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
@endif

@endsection
