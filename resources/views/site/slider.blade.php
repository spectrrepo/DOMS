
@extends('layouts.site')
@section('site-content')
          <div class="content  uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 tm-grid-heights">
            <div class="col-slider-comment">
            <div class="one-picture-place">
              <div class="b-photo-slider">
                       <div class="wrap-slider">
                                  @foreach ($images as $image_el)
                                        @if ($image_el->id == $image->id)
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
                        </div>
                <div class="control-slide">
                  <a class="btn-prew">
                    <span class="uk-icon-justify uk-icon-chevron-left"></span>
                  </a>
                  <a class="btn-next">
                    <span class="uk-icon-justify uk-icon-chevron-right"></span>
                  </a>
                </div>
                <div class="b-informstion">
                  <span class="b-pretens">
                    idPhoto
                  </span>
                  <span class="num-page">
                    {{ $image->id }}/ {{ $num_image }}
                  </span>
                  <span class="status-photo">
                    <span class="b-tooltip-visible  back-to-main">
                      <span class="wrap-tooltip-gallery">
                        <span class="tooltip-stat-gallery">Плитка</span>
                        <span class="triangle-tooltip-stat"></span>
                      </span>
                      <a href="{{URL::route('index')}}" class="ico-slider uk-icon-justify uk-icon-th-large"></a>
                    </span>
                    <span class="b-tooltip-visible full-scrn">
                      <span class="wrap-tooltip-gallery">
                        <span class="tooltip-stat-gallery big">На весь экран</span>
                        <span class="triangle-tooltip-stat"></span>
                      </span>
                      <span class="ico-slider uk-icon-justify uk-icon-arrows-alt"></span>
                    </span>
                    <span class="b-tooltip-visible liked">
                      <span class="wrap-tooltip-gallery">
                        <span class="tooltip-stat-gallery">Избранное</span>
                        <span class="triangle-tooltip-stat"></span>
                      </span>
                      {{ Form::open( array('url' => '/liked'))}}
                      <input type="hidden" name="post_id" value="{{ $image->id }}">
                      <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                      <button type="submit" class="ico-slider uk-icon-justify uk-icon-star"></button>
                      {{ Form::close()}}
                    </span>
                    <span class="b-tooltip-visible share">
                      <span class="wrap-tooltip-gallery">
                        <span class="tooltip-stat-gallery">Поделиться</span>
                        <span class="triangle-tooltip-stat"></span>
                      </span>
                      <span class="ico-slider uk-icon-justify uk-icon-share-alt"></span>
                    </span>
                    <span class="b-tooltip-visible comment">
                      <span class="wrap-tooltip-gallery">
                        <span class="tooltip-stat-gallery large">Количество комментариев</span>
                        <span class="triangle-tooltip-stat"></span>
                      </span>
                      <span class="ico-slider uk-icon-justify uk-icon-comments"></span>
                      <span>{{ $num_comment }}</span>
                    </span>
                    <span class="b-tooltip-visible like">
                      <span class="wrap-tooltip-gallery">
                        <span class="tooltip-stat-gallery">Понравилось</span>
                        <span class="triangle-tooltip-stat"></span>
                      </span>
                      {{ Form::open(array('url' => '/like', 'style' => 'float:left'))}}
                      <input type="hidden" name="post_id" value="{{ $image->id }}">
                      <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                      <button type="submit" class="ico-slider uk-icon-justify uk-icon-heart"></button>
                      {{ Form::close()}}
                      <span>{{ $num_like }}</span>
                    </span>
                    <span class="b-tooltip-visible view">
                      <span class="wrap-tooltip-gallery">
                        <span class="tooltip-stat-gallery">Количество просмотров</span>
                        <span class="triangle-tooltip-stat"></span>
                      </span>
                      <span class="ico-slider uk-icon-justify uk-icon-eye"></span>
                      <span>1</span>
                    </span>
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
                        {{ $comment->date }}
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
                    <div class="item">
                              <img src="" alt="" />
                              <p>
                               Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                               sed do eiusmod tempor incididunt ut labore et dolore magna
                               aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                               ullamco laboris nisi ut aliquip ex ea commodo consequat.
                               Duis aute irure dolor in reprehenderit in voluptate velit
                               esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                               occaecat cupidatat non proident, sunt in culpa qui officia
                               deserunt mollit anim id est laborum.
                              </p>
                    </div>
                    <div class="item">
                              <img src="" alt=" " />
                              <p>
                               Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                               sed do eiusmod tempor incididunt ut labore et dolore magna
                               aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                               ullamco laboris nisi ut aliquip ex ea commodo consequat.
                               Duis aute irure dolor in reprehenderit in voluptate velit
                               esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                               occaecat cupidatat non proident, sunt in culpa qui officia
                               deserunt mollit anim id est laborum.
                              </p>
                    </div>

                  </div>

                </div>
              </div>
            </div>
            <div class="clear"></div>
          </div>
    @endsection
