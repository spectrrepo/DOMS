
@extends('layouts.site')
@section('site-content')
          <div class="content  uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 tm-grid-heights">
            <div class="col-slider-comment">
            <div class="one-picture-place">
              <div class="b-photo-slider">
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
                                            <a class="btn-prew">
                                                      <span class="uk-icon-justify uk-icon-chevron-left"></span>
                                            </a>
                                            <a class="btn-next">
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
                <div class="b-informstion">
                  <span class="b-pretens">
                    <a href="/profile/{{ $user->id }}">
                      <span class="author-portret">
                         <img src=" {{ $user->avatar->url('small')}} " alt="" />
                      </span>
                      <span class="author-name">{{ $user->name}}</span>
                    </a>
                    <!-- <div class="b-item-stat pretense-tool">
                      <span class="b-pretense">?</span>
                      <span class="tooltip-stat margin-full-scr-tooltip">
                        <span class="text-tooltip-stat">
                         Заявить права
                        </span>
                        <span class="triangle-tooltip-stat triangle-full-scr"></span>
                      </span>
                    </div> -->
                  </span>
                  <span class="num-page">
                    <span id="current-position"></span>/ <span id="all-photo"></span>
                  </span>
                  <span class="status-photo">
                    <div class="b-item-stat back-to-main">
                      <a  class="ico-slider uk-icon-justify uk-icon-th-large"></a>
                      <span class="tooltip-stat margin-callback-tooltip">
                        <span class="text-tooltip-stat">
                         Плитка
                        </span>
                        <span class="triangle-tooltip-stat triangle-callback"></span>
                      </span>
                    </div>
                    <div class="b-item-stat full-scrn">
                      <a href="{{ $image->photo->url() }}" class="ico-slider uk-icon-justify uk-icon-arrows-alt fancybox"  data-fancybox-group="main"></a>
                      <span class="tooltip-stat margin-full-scr-tooltip">
                        <span class="text-tooltip-stat">
                         На весь экран
                        </span>
                        @foreach ($images as $image_el)
                        <a href="{{ $image_el->photo->url() }}" class="fancybox"  data-fancybox-group="main"></a>

                        @endforeach
                        <span class="triangle-tooltip-stat triangle-full-scr"></span>
                      </span>
                    </div>
                    <div class="b-item-stat liked">
                      <input type="hidden" name="post_id" value="{{ $image->id }}">
                      <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                      <input type="hidden" name="url-liked" value="{{ $colorLiked ? '/delete_liked' : '/liked' }}">
                      <button id="num_liked" class="{{ $colorLiked ? 'active-favorite ': ''}}ico-slider uk-icon-justify uk-icon-star"></button>
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
                       <input type="hidden" name="post_id" value="{{ $image->id }}">
                       <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                       <input type="hidden" name="url-like" value="{{ $colorLike ? '/delete_like' : '/like' }}">
                       <button class="{{ $colorLike ? 'active-like ': ''}}ico-slider uk-icon-justify uk-icon-heart"></button>
                      <span id="value-like">{{ $num_like }}</span>
                      <span class="tooltip-stat margin-like-tooltip">
                        <span class="text-tooltip-stat">
                         Понравилось
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
            </div>
            <div class="b-comments">
              <div class="b-com-title">
                Коментарии
              </div>
              <div class="b-all-comment">
                @foreach ( $comments as $comment )

                  <div class="b-comment">
                    <a style="background:url({{ $user->avatar->url('max') }})"href="{{ URL::to('profile/'.$comment->user_id) }}" class="b-photo-comment"></a>
                    <div class="b-comment">
                      <a href="{{ URL::to('profile/'.$comment->name) }}" class="b-name-comment">
                        {{ $comment->user_id }}
                      </a>
                      <div class="b-text-comment">
                        {{ $comment->text_comment }}
                      </div>
                      <div class="b-date-comment">
                        {{ $comment->date->format('d M Y H:i') }}
                      </div>
                    </div>
                  </div>

                @endforeach
              </div>
              @if (Auth::check())
                        <div class="b-add-comment">
                          <input type="text" name="comment" class="input-comment" placeholder="Комментировать">
                          <input type="hidden" name="post_id" value="{{ $image->id }}">
                          <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                          <button class="submit-comment">
                            <span class="uk-icon-justify uk-icon-plus"></span>
                          </button>
                        </div>
              @else
                    <p>
                    Только зарегистрированные пользователи могут оставить комментарий
                    </p>
              @endif
            </div>
          </div>
            <div class="col-descreption-photo">
              @if ( $tags->count() > 1)
                <div class="title-tag">
                  Тэги
                </div>
                <div class="pole-tag">
                  @foreach ( $tags as $tag )

                    <div class="tag-item">{{ $tag->title }}</div>

                  @endforeach
                </div>
              @endif
              <div class="clear"></div>
              @if ( $views->count() > 1 )
                <div class="title-tag margin-title-tag">
                  Ракурсы
                </div>
                <div class="view-photo-slide">
                  <div class="b-change-photo">
                    <div class="owl-demo" id="owl-demo">
                      @foreach ($views as $view)
                        <a class="fancybox" href="{{ $view->path_full }}" data-fancybox-group="gallery" >
                          <div class="item">
                            <img src="{{ $view->path_min }}" alt="" />
                          </div>
                        </a>
                      @endforeach
                    </div>
                  </div>
                </div>
              @endif
              @if (!empty($image->title) || !empty($image->description))
                <div class="title-tag margin-title-tag">
                   Описание
                </div>
                <div class="view-photo-slide">
                  <h3>{{$image->title}}</h3>
                  <p>
                   {{ $image->description }}
                  </p>
                </div>
              @endif
            </div>
            <div class="clear"></div>
          </div>
          <div id="all-info-photo">
            <div id="allTags">
              @foreach ($allTags as $tag)
                <div data-id="{{ $tag->id }}" data-postID="{{ $tag->post_id }}">{{ $tag->title }}</div>
              @endforeach
            </div>
            <div id="allComments">
              @foreach ($allComments as $comment)
                <div data-id="{{ $comment->id }}" data-path="{{ $comment->avatar_file_name }}" data-postID="{{ $comment->post_id }}" data-user="{{ $comment->user_id }}" data-portret="{{ $comment->id }}" data-date="{{ $comment->date->format('d M Y H:i') }}" data-name="{{ $comment->name }}">{{ $comment->text_comment }} </div>
              @endforeach
            </div>
            <div id="allViews">
              @foreach ($allViews as $view)
                <div data-id="{{ $view->id }}" data-postID="{{ $view->post_id }}" data-path="{{ $view->photo->url() }}"></div>
              @endforeach
            </div>
            <div id="allUserViews">
              @foreach ($images as $image)
                <div data-id="{{ $image->id }}" data-count="{{ $image->views_count }}"></div>
              @endforeach
            </div>
            <div id="allLikes">
              @foreach ($allLikes as $like)
                <div data-id="{{ $like->id }}" data-postID="{{ $like->post_id }}" data-user="{{ $like->user_id }}"></div>
              @endforeach
            </div>
            <div id="allLikeds">
              @foreach ($allLikeds as $liked)
                <div data-id="{{ $liked->id }}" data-postID="{{ $liked->post_id }}" data-user="{{ $liked->user_id }}"></div>
              @endforeach
            </div>
            <div id="allDescriptionPhoto">
              @foreach ($images as $image_el)
                <div data-id="{{ $image_el->id }}">{{ $image_el->description }}</div>
              @endforeach
            </div>
            <div id="allTitlePhoto">
              @foreach ($images as $image_el)
                <div data-id="{{ $image_el->id }}">{{ $image_el->title }}</div>
              @endforeach
            </div>
          </div>
    @endsection
