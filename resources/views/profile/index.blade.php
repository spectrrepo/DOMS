@extends('layouts.profile')
@section('profile-content')

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
              <div class="b-portret-blogger">
                <img src="{{ !($image->quadro_ava_add === null ) ? $image->quadro_ava_add : '/img/user.png' }}"/>
              </div>
          </div>
          <div class="col-news-big">
              <div class="b-name-redactor"><a href="/profile/{{$image->user_id_add}}">{{$image->name_user_add}}</a></div>
              <div class="b-post-body">
                <div class="b-photo-post">
                  <img src="{{$image->img_photo}}" class="img-post" alt="" />
                </div>
                <div class="b-iformation">
                  <div class="b-date">
                    <?php setlocale(LC_TIME, 'ru_RU.utf8');  echo \Carbon\Carbon::parse($image->date_event)->formatLocalized('%d %b %Y') ?>
                  </div>
                  <div class="b-statistics">
                    <div class="b-item-stat">
                      <span class="ico uk-icon-justify uk-icon-eye"></span>
                      <span class="num-stat">{{ !empty($image->views_count) ? $image->views_count : '0' }}</span>
                      <span class="tooltip-stat margin-num-comment-tooltip">
                        <span class="text-tooltip-stat">
                          количество просмотров
                        </span>
                        <span class="triangle-tooltip-stat"></span>
                      </span>
                    </div>
                    <div class="b-item-stat">
                      <span class="ico uk-icon-justify uk-icon-heart"></span>
                      <span class="num-stat">{{ !empty($image->likes_count) ? $image->likes_count : '0' }}</span>
                      <span class="tooltip-stat margin-like-tooltip">
                        <span class="text-tooltip-stat">
                          понравилось
                        </span>
                        <span class="triangle-tooltip-stat"></span>
                      </span>
                    </div>
                    <div class="b-item-stat">
                      <span class="ico uk-icon-justify uk-icon-star"></span>
                      <span class="num-stat">{{ !empty($image->favs_count) ? $image->favs_count : '0' }}</span>
                      <span class="tooltip-stat margin-liked-tooltip">
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
              @foreach ($commentsImage as $comment)
                @if ($comment->img_id == $image->img_id)
                  <div class="b-comment-wrap">
                    <a href="/profile/{{ $comment->comment_user_id }}" class="b-photo-comment">
                       <img src="{{ !($comment->comment_quadro_ava === null ) ? $comment->comment_quadro_ava : '/img/user.png' }}" alt="">
                    </a>
                    <div class="b-comment">
                      <a href="/profile/{{ $comment->comment_user_id }}" class="b-name-comment">
                        {{ $comment->comment_user_name }}
                      </a>
                      <div class="b-text-comment">
                        {{ $comment->comment_text }}
                      </div>
                      <div class="b-date-comment">
                        {{ $comment->comment_date }}
                      </div>
                    </div>
                  </div>
                    {{-- <span>{{ $comment->img_id }}</span> --}}
                    {{-- <span>{{ $comment->comment_status }}</span> --}}
                @endif
             @endforeach
              <div class="clear"></div>
          </div>
          @if ($image->type === 'favorite')
            <div class="col-news-min">
              <div class="b-portret-blogger"
                   style="background:url(
                   {{ !($image->quadro_ava_user_event === null ) ? $image->quadro_ava_user_event : '' }}) center no-repeat;
                          background-size: cover;">
                    <span class="ico ico-news ico-news-star uk-icon-justify uk-icon-star"></span>
              </div>
            </div>
            <div class="col-news-big">
              <div class="b-name-redactor">
                <a href="/profile/{{$image->id_user_event}}">
                  {{$image->user_name_event}}
                </a>
                <span class="event-text">
                  @if ($image->sex_user_event == 1 )
                    добавил фотографию в избранное
                  @elseif ($image->sex_user_event == 2)
                    добавила фотографию в избранное
                  @else
                    добавил(а) фотографию в избранное
                  @endif
                </span>
                <p class="date-event-text">
                  <?php setlocale(LC_TIME, 'ru_RU.utf8');  echo \Carbon\Carbon::parse($image->date_event)->formatLocalized('%d %b %Y') ?>
                </p>
              </div>
            </div>
          @elseif ($image->type === 'like')
            <div class="col-news-min">
              <div class="b-portret-blogger">
                  <img src="{{ !($image->quadro_ava_user_event === null ) ? $image->quadro_ava_user_event : '/img/user.png' }}"/>
                  <span class="ico ico-news ico-news-hearth uk-icon-justify uk-icon-heart"></span>
              </div>
            </div>
            <div class="col-news-big">
              <div class="b-name-redactor">
                <a href="/profile/{{$image->id_user_event}}">
                  {{$image->user_name_event}}
                </a>
                <span class="event-text">
                  @if ($image->sex_user_event == 1 )
                    оценил фотографию
                  @elseif ($image->sex_user_event == 2)
                    оценилa фотографию
                  @else
                    оценил(a) фотографию
                  @endif
                </span>
                <p class="date-event-text">
                  <?php setlocale(LC_TIME, 'ru_RU.utf8');  echo \Carbon\Carbon::parse($image->date_event)->formatLocalized('%d %b %Y') ?>
                </p>
              </div>
            </div>
          @endif

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
