
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
                    <div class="b-item-stat pretense-tool">
                      <span class="b-pretense">?</span>
                      <span class="tooltip-stat margin-full-scr-tooltip">
                        <span class="text-tooltip-stat">
                         Заявить права
                        </span>
                        <span class="triangle-tooltip-stat triangle-full-scr"></span>
                      </span>
                    </div>
                  </span>
                  <span class="num-page">
                    <span id="current-position"> {{ $image->id }} </span>/ {{ $num_image }}
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
                        <span class="triangle-tooltip-stat triangle-full-scr"></span>
                      </span>
                    </div>
                    <div class="b-item-stat liked">
                      <input type="hidden" name="post_id" value="{{ $image->id }}">
                      <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                      <input type="hidden" name="url-liked" value="{{ $colorLiked ? '/delete_liked' : '/liked' }}">
                      <button class="{{ $colorLiked ? 'active-favorite ': ''}}ico-slider uk-icon-justify uk-icon-star"></button>
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
                      <span>{{ $num_comment }}</span>
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
                      <span> {{ $image->views_count }}</span>
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
                    <a href="{{ URL::to('profile/'.$comment->user_id) }}" class="b-photo-comment"></a>
                    <div class="b-comment">
                      <a href="{{ URL::to('profile/'.$comment->user_id) }}" class="b-name-comment">
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
              <div class="title-tag">
                Тэги
              </div>
              <div class="pole-tag">
                @foreach ( $tags as $tag )

                  <div class="tag-item">{{ $tag->title }}</div>

                @endforeach
              </div>
              <div class="clear"></div>
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
            </div>
            <div class="clear"></div>
          </div>
    @endsection
