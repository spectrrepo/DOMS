
@extends('layouts.site')
@section('site-content')
 <div class="content  uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 tm-grid-heights">
   <div class="col-slider-comment">
   <div id="hide-pole-tag" class="title-tag" style="margin-bottom:10px;">
         <span class="title-slider-tag" style="float:left;">Поиск по тегам:</span>
         <div class="tag-item">Привет</div>
            <div class="clear"></div>
   </div>
     <div class="one-picture-place">
       <div class="b-photo-slider">
          @include('popups.modal_racourse')
          @include('popups.law')
         <div class="wrap-slider">
           @foreach ($images as $image_el)
            @if ($image_el->id === $image->id)
                <div class="photo-item active-slide" data-id="{{ $image->id }}">
                    <img class="img-slider" src="{{ $image_el->photo->url() }}" />
                </div>
            @elseif ($image_el->id < $image->id)
                <div class="photo-item left-slide" data-id="{{ $image_el->id }}">
                    <img class="img-slider" src="{{ $image_el->photo->url() }}" />
                </div>
            @else
                <div class="photo-item right-slide" data-id="{{ $image_el->id }}">
                    <img class="img-slider" src="{{ $image_el->photo->url() }}" />
                </div>
            @endif
           @endforeach
           <div class="control-slide">
              <a class="btn-prew btn-nav" data-direction="left">
                <span class="uk-icon-justify uk-icon-chevron-left"></span>
              </a>
              <a class="btn-next btn-nav" data-direction="right">
                <span class="uk-icon-justify uk-icon-chevron-right"></span>
              </a>
           </div>
           <div id="popup-error-slider" class="popup-error-slider-white">
              <div class="modal-error-slider">
                <span class="close uk-icon-justify uk-icon-remove popup-error-close"></span>
                <div class="center-block">
                 Фотографии по вашему запросу закончились
                </div>
              </div>
           </div>
         </div>
        </div>
        <div class="b-informstion">
          <span class="b-pretens">
            <a href="/profile/{{ $user->id }}">
              <span class="author-portret">
                  <img src=" {{ $user->avatar->url('small')}} " alt="" />
              </span>
              <span class="author-name">{{ $user->name}}</span>
            </a>
            @if (Auth::check())
               <div class="b-item-stat pretense-tool">
                     <span class="b-pretense">?</span>
                     <span class="tooltip-stat margin-full-scr-tooltip">
                     <span class="text-tooltip-stat">
                     Заявить права
                   </span>
                   <span class="triangle-tooltip-stat triangle-full-scr"></span>
                 </span>
               </div>
            @endif
          </span>
          <span class="num-page">
            <span id="current-position"></span>/ <span id="all-photo">{{ $imageAll->count() }}</span>
          </span>
          <span class="status-photo">
            <div class="b-item-stat back-to-main">
              <a href="/" class="ico-slider uk-icon-justify uk-icon-th-large"></a>
              <span class="tooltip-stat margin-callback-tooltip">
                <span class="text-tooltip-stat">
                  Плитка
                </span>
                <span class="triangle-tooltip-stat triangle-callback"></span>
              </span>
            </div>
            <div class="b-item-stat full-scrn">
              <a class="ico-slider uk-icon-justify uk-icon-arrows-alt"></a>
              <span class="tooltip-stat margin-full-scr-tooltip">
                <span class="text-tooltip-stat">
                  На весь экран
                </span>
                <span class="triangle-tooltip-stat triangle-full-scr"></span>
              </span>
            </div>
            <div class="b-item-stat liked">
              @if (Auth::check())
                 <input type="hidden" name="post_id" value="{{ $image->id }}">
                 <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                 <input type="hidden" name="url-liked" value="{{ $colorLiked ? '/delete_liked' : '/liked' }}">
              @endif
              <button
              @if (Auth::check())
                 id="num_liked"
              @endif  class="{{ $colorLiked ? 'active-favorite ': ''}}ico-slider uk-icon-justify uk-icon-star"></button>
              <span class="tooltip-stat margin-liked-tooltip">
                <span class="text-tooltip-stat">
                  Избранное
                </span>
                <span class="triangle-tooltip-stat"></span>
              </span>
            </div>
            <div class="b-item-stat share">
              <span class="ico-slider uk-icon-justify uk-icon-share-alt"></span>
              <span class="tooltip-stat margin-share-tooltip">
                <span class="text-tooltip-stat">
                  Поделиться
                </span>
                <span class="triangle-tooltip-stat"></span>
              </span>
            </div>
            <div class="b-item-stat comment">
              <span class="ico-slider uk-icon-justify uk-icon-comments"></span>
              <span id="num_comment">{{ $num_comment }}</span>
              <span class="tooltip-stat margin-num-comment-tooltip">
                <span class="text-tooltip-stat">
                  Количество коментариев
                </span>
                <span class="triangle-tooltip-stat"></span>
              </span>
            </div>
            <div class="b-item-stat like">
               @if (Auth::check())
                  <input type="hidden" name="post_id" value="{{ $image->id }}">
                  <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                  <input type="hidden" name="url-like" value="{{ $colorLike ? '/delete_like' : '/like' }}">
               @endif
              <button class="{{ $colorLike ? 'active-like ': ''}}ico-slider uk-icon-justify uk-icon-heart"></button>
              <span id="value-like">{{ $num_like }}</span>
              <span class="tooltip-stat margin-like-tooltip">
                <span class="text-tooltip-stat">
                  Понравилось
                  <span id="like-whom-pole">
                    @foreach ($likeWhom as $like)
                      <a class="mini-avatar"
                      href="/user/{{ $like->id }}"
                      title="{{ $like->name }}">
                      <img src="{{ $like->path_min }}"></a>
                    @endforeach
                  </span>
                </span>
                <span class="triangle-tooltip-stat"></span>
              </span>
            </div>
            <div class="b-item-stat view">
              <span class="ico-slider uk-icon-justify uk-icon-eye"></span>
              <span id="num_views"> {{ $image->views_count }}</span>
              <span class="tooltip-stat other-margin-tooltip1">
                <span class="text-tooltip-stat">
                  Количество просмотров
                </span>
                <span class="triangle-tooltip-stat"></span>
              </span>
            </div>
          </span>

        </div>
            </div>
            <div class="b-comments">
              <div class="b-com-title">
                Коментарии
              </div>
              <div class="b-all-comment">
                @foreach ( $comments as $comment )

                  <div class="b-comment-wrap">
                     @if (Auth::check())
                        {!! Auth::user()->id === $comment->user_id ? HTML::decode('<span class="remove-comment uk-icon-justify uk-icon-remove"><span class="delete_comment_id" data-id="'.$comment->id.'"></span></span>') : ''!!}
                     @endif
                    <a style="background:url({{ $comment->userPhoto }}) center no-repeat;background-size:cover;"href="{{ URL::to('profile/'.$comment->user_id) }}" class="b-photo-comment"></a>
                    <div class="b-comment">
                      <a href="{{ URL::to('profile/'.$comment->userName) }}" class="b-name-comment">
                        {{ $comment->userName }}
                      </a>
                      <div class="b-text-comment">
                        {{ $comment->text_comment }}
                      </div>
                      <div class="b-date-comment">
                        <?php setlocale(LC_TIME, 'ru_RU.utf8');  echo \Carbon\Carbon::parse($comment->date)->formatLocalized('%d %b %Y') ?>
                      </div>
                    </div>
                  </div>

                @endforeach
              </div>
              @if (Auth::check())
                        <div class="b-add-comment">
                          <form class="comment-add-form">
                            <input type="text" name="comment" class="input-comment" placeholder="Комментировать">
                            <input type="hidden" name="post_id" value="{{ $image->id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                            <button class="submit-comment" type="submit">
                              <span class="uk-icon-justify uk-icon-plus"></span>
                            </button>
                          </form>
                        </div>
              @else
                    <p>
                    Только зарегистрированные пользователи могут оставить комментарий
                    </p>
              @endif
            </div>
          </div>
            <div class="col-descreption-photo">
                <div id="tag" class="title-tag" {{ $tags->count() > 1 ? '' : 'style=display:none;' }}>
                  Тэги
                </div>
                <div class="pole-tag" {{ $tags->count() > 1 ? '': 'style=display:none;' }}>
                  @foreach ( $tags as $tag )

                    <div class="tag-item">{{ $tag->title }}</div>

                  @endforeach
                </div>
              <div class="clear"></div>
                <div id="views" class="title-tag margin-title-tag" {{ $views->count() >= 1 ? '': 'style=display:none;' }}>
                  Ракурсы
                </div>
                <div id="views-pole" class="view-photo-slide" {{ $views->count() >= 1 ? '': 'style=display:none;' }}>
                  <div class="b-change-photo">
                      @foreach ($views as $view)
                        @if ($views[0] == $view)
                           <div class="item-view-min active-view-min">
                             <img src="{{ $view->path_min }}" alt="" />
                           </div>
                        @else
                           <div class="item-view-min right-view-min">
                             <img src="{{ $view->path_min }}" alt="" />
                           </div>
                        @endif

                      @endforeach
                  </div>
                  <span class="min-nav-views prev-min-nav-views" data-direction="prev"></span>
                  <span class="min-nav-views next-min-nav-views" data-direction="next"></span>
                </div>
                <div  id="description" class="title-tag margin-title-tag" {{ empty($image->description) ? 'style=display:none;' : '' }}>
                   Описание
                </div>
                <div id="description-pole" class="view-photo-slide" {{ empty($image->description) ? 'style=display:none;' : '' }}>
                  <h3>{{$image->title}}</h3>
                  <p>
                   {{ $image->description }}
                  </p>
                </div>
            </div>
            <div class="clear"></div>
          </div>
          </div>
          @include('../popup_for_slider')
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
         <input type="hidden" name="lastId" value=" $imageLast->id ">

         <input type="hidden" name="sortSorting" value="{{ $sortSorting }}">
         <input type="hidden" name="styleSorting" value="{{ $styleSorting }}">
         <input type="hidden" name="roomSorting" value="{{ $roomSorting }}">
         <input type="hidden" name="colorSorting" value="{{ $colorSorting }}">
         <input type="hidden" name="tagSorting" value="{{ $tagSorting }}">
         <input type="hidden" name="IdPhoto" value="{{ $image->id }}">
    @endsection
