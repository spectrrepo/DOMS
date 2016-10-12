
@extends('layouts.site')
@section('site-content')
          <div class="content  uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 tm-grid-heights" data-uk-grid>
            <div class="col-slider-comment">
            <div class="one-picture-place">
              <div class="b-photo-slider">
                <div class="photo-item"></div>
                <div class="control-slide">
                  <a href="/photo/{{$image->id - 1}}" class="btn-prew">
                    <span class="uk-icon-justify uk-icon-chevron-left"></span>
                  </a>
                  <a href="/photo/{{$image->id + 1}}" class="btn-next">
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
                      <span class="ico-slider uk-icon-justify uk-icon-th-large"></span>
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
                      <span class="ico-slider uk-icon-justify uk-icon-star"></span>
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
                      <a href="/like" class="ico-slider uk-icon-justify uk-icon-heart"></a>
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
                    <div class="b-photo-comment"></div>
                    <div class="b-comment">
                      <div class="b-name-comment">
                        {{ $comment->user_id }}
                      </div>
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
              <div class="b-add-comment">
                {{Form::open(array('url' => '/comment')) }}
                <input type="text" name="comment" class="input-comment" placeholder="Комментировать">
                <button class="submit-comment" type="submit">
                  <span class="uk-icon-justify uk-icon-plus"></span>
                </button>
                {{Form::close()}}
              </div>
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
              <div class="view-photo-slide">
                @foreach ( $views as $view )

                    <img src=" {{ $view->id }} " alt=" {{ $view->date }} " />

                @endforeach
              </div>
            </div>
          </div>
    @endsection
