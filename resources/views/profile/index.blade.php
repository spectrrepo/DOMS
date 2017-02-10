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
    @foreach($news as $newItem => $item)
      <div class="b-person-post">
        <div class="col-news-min">
          <a href="/profile/{{$item[0]->user_id_add}}" class="b-portret-blogger">
            <img src="{{ !($item[0]->quadro_ava_add === null ) ? $item[0]->quadro_ava_add : '/img/user.png' }}"/>
          </a>
        </div>
        <div class="col-news-big">
          <div class="b-name-redactor">
            <a href="/profile/{{$item[0]->user_id_add}}">{{$item[0]->name_user_add}}</a>
          </div>
          <div class="b-post-body">
            <a href="/photo/id=[{{ $item[0]->img_id }}],room=[0],styles=[0],colors=[0],sort=[0],tag=[0]" class="b-photo-post">
              <img src="{{$item[0]->img_photo}}" class="img-post" alt="" />
            </a>
            <div class="b-iformation">
              <div class="b-date">
                {{ $item[0]->date_rus_event }}
              </div>
              <div class="b-statistics">
                <div class="b-item-stat">
                  <span class="ico uk-icon-justify uk-icon-eye"></span>
                  <span class="num-stat">
                    {{ !empty($item[0]->views_count) ? $item[0]->views_count : '0' }}
                  </span>
                  <span class="tooltip-stat margin-num-comment-tooltip">
                    <span class="text-tooltip-stat">
                      количество просмотров
                    </span>
                    <span class="triangle-tooltip-stat"></span>
                  </span>
                </div>
                <div class="b-item-stat">
                  <span class="ico uk-icon-justify uk-icon-heart"></span>
                  <span class="num-stat">
                    {{ !empty($item[0]->likes_count) ? $item[0]->likes_count : '0' }}
                  </span>
                  <span class="tooltip-stat margin-like-tooltip">
                    <span class="text-tooltip-stat">
                      понравилось
                    </span>
                    <span class="triangle-tooltip-stat"></span>
                  </span>
                </div>
                <div class="b-item-stat">
                  <span class="ico uk-icon-justify uk-icon-star"></span>
                  <span class="num-stat">
                    {{ !empty($item[0]->favs_count) ? $item[0]->favs_count : '0' }}
                  </span>
                  <span class="tooltip-stat margin-liked-tooltip">
                    <span class="text-tooltip-stat">
                    избранное
                    </span>
                    <span class="triangle-tooltip-stat"></span>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="clear"></div>
          <?php $comment_last_id = ''; $i = 0;
                foreach ($item as $key)
                { if ($key->type == 'comment')
                   {$comment_last_id = $key->comment_id; $count = $i++ ;}} $k = 0?>
          @if (($count >= 3)&&($comment_last_id != ''))
            <div class="btn-all-comments-news">Показать все {{ $count+1 }} комментари{{ $count+1==4 ? 'я':'ев' }}</div>
          @endif
          <div id="rubberSquare">
          @foreach($item  as  $key)
            @if ($key->type == 'comment')
                  <div class="b-comment-wrap" {{ ($k <= $count-3) && ($count >= 3) ? 'style=display:none' : '' }}>
                    <?php $k++; ?>
                  <a href="/profile/{{ $key->id_user_event }}" class="b-photo-comment">
                    <img src="{{ !($key->quadro_ava_user_event === null ) ? $key->quadro_ava_user_event : '/img/user.png'}}" alt="">
                  </a>
                  <div class="b-comment">
                    <a href="/profile/{{ $key->id_user_event }}" class="b-name-comment">
                      {{ $key->user_name_event }}
                    </a>
                    <div class="b-text-comment">
                      {{ $key->comment_text }}
                    </div>
                    <div class="b-date-comment">
                      {{ $key->date_rus_event }}
                    </div>
                  </div>
                  <div class="clear"></div>
                  @if ($key->comment_id != $comment_last_id)
                    <hr>
                  @endif
                </div>
            @endif
          @endforeach
          </div>
        </div>
        <?php $j=0; ?>
        @foreach($item  as  $key)
          @if (($key->type == 'like'))
          <?php $j++ ; if ($j >1) break; ?>
          <div class="">
            <div class="col-news-min">
              <a href="/profile/{{ $key->id_user_event }}" class="b-portret-blogger">
                <img src="{{ !($key->quadro_ava_user_event === null ) ? $key->quadro_ava_user_event : '/img/user.png' }}"/>
                <span class="ico ico-news ico-news-hearth uk-icon-justify uk-icon-heart"></span>
              </a>
            </div>
            <div class="col-news-big">
              <div class="b-name-redactor">
                <a href="/profile/{{$key->id_user_event}}">
                  {{$key->user_name_event}}
                </a>
                <span class="event-text">
                  <?php $cnt = 0; foreach($item as $key) { if ($key->type == 'like') $cnt++; } $num_people = $cnt - 1; ?>
                  @if ($key->sex_user_event == 1 )
                    оценил фотографию
                  @elseif ($key->sex_user_event == 2)
                    оценилa фотографию
                  @elseif ($num_people > 1)
                    @if ((floor($num_people%10) < 5) && (floor($num_people%10) > 1))
                      и ещё {{ $num_people }} человека оценили фотографию
                    @else
                      и ещё {{ $num_people }} человек оценили фотографию
                    @endif
                  <div class="clear"></div>
                    @for ($i = 1; $i < count($item); $i++)
                      @if (($item[$i]->type == 'like') && ($item[$i]->id_user_event != $item[$i-1]->id_user_event))
                        <a href="/profile/{{ $item[$i]->id_user_event }}" style="display:inline-block;width:50px;">
                          <img src="{{ !($item[$i]->quadro_ava_user_event === null ) ? $item[$i]->quadro_ava_user_event : '/img/user.png' }}" alt="" />
                        </a>
                      @endif
                    @endfor
                  @endif
                </span>
                <p class="date-event-text">
                  {{ $key->date_rus_event }}
                </p>
              </div>
            </div>
            <div class="clear"></div>
          </div>
          @endif
        @endforeach
        <?php $k=0; ?>
        @foreach($item  as  $key)
          @if ($key->type == 'favorite')
          <?php $k++ ; if ($k >1) break; ?>
            <div class="">
              <div class="col-news-min">
                <a href="/profile/{{ $key->id_user_event }}" class="b-portret-blogger">
                  <img src="{{ !($key->quadro_ava_user_event === null ) ? $key->quadro_ava_user_event : '/img/user.png' }}"/>
                  <span class="ico ico-news ico-news-star uk-icon-justify uk-icon-star"></span>
                </a>
              </div>
              <div class="col-news-big">
                <div class="b-name-redactor">
                  <a href="/profile/{{$key->id_user_event}}">
                    {{$key->user_name_event}}
                  </a>
                  <span class="event-text">
                    <?php $cnt = 0; foreach($item as $key) { if ($key->type == 'like') $cnt++; } $num_people = $cnt - 1; ?>
                    @if ($key->sex_user_event == 1 )
                      добавил фотографию в избранное
                    @elseif ($key->sex_user_event == 2)
                      добавила фотографию в избранное
                    @elseif (($num_people) > 1)
                      @if ((floor($num_people%10) < 5) && (floor($num_people%10) > 1))
                        и ещё {{ $num_people }} человек добавили фотографию в избранное
                      @else
                        и ещё {{ $num_people }} человек добавили фотографию в избранное
                      @endif
                    <div class="clear"></div>
                      @for ($i = 0; $i < count($item) + 1; $i++)
                        @if (($item[$i]->type == 'favorite') && ($item[$i]->id_user_event != $item[$i+1]->id_user_event))
                          <a href="/profile/{{ $item[$i]->id_user_event }}" style="display:inline-block;width:50px;">
                            <img src="{{ !($item[$i]->quadro_ava_user_event === null ) ? $item[i]->quadro_ava_user_event : '/img/user.png' }}" alt="" />
                          </a>
                        @endif
                      @endfor
                    @endif
                  </span>
                  <p class="date-event-text">
                    {{ $key->date_rus_event }}
                  </p>
                </div>
              </div>
              <div class="clear"></div>
            </div>
          @endif
        @endforeach
        <div class="clear"></div>
      </div>
    @endforeach
  </div>
  <div class="clear"></div>
</div>
{{-- <div class="btn-dwnld-new">
  Загрузить ещё
</div> --}}
@endsection
