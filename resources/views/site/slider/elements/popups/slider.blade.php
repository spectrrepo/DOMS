<div class="overlay" id="zoom-slider">
  <span class="close slider-close uk-icon-justify uk-icon-remove"></span>
  <div class="img-max-area">
    <img class="img-max-center" src="{{ Storage::url($posts->first()->img_large) }}" alt="" />
    <div class="navigation-zoom-slider">
      <span class="nav-zoom left uk-icon-justify uk-icon-chevron-left" data-direction="left"></span>
      <span class="nav-zoom right uk-icon-justify uk-icon-chevron-right" data-direction="right"></span>
    </div>
  </div>
  <div class="info-about-max-photo">
    <span class="b-pretens-zoom">
      <a href="/profile/{{ $posts->first()->user->id }}">
        <span class="author-portret-zoom">
          <img id="zoom-photo" src=" {{ Storage::url($posts->first()->user->img_mini)}} " alt="" />
        </span>
        <span class="author-name-zoom">{{ $posts->first()->user->name}}</span>
      </a>
    </span>
    <span class="num-page-zoom">
      <span id="current-position-zoom"></span>/
      <span id="all-photo-zoom">{{ count($posts) }}</span>
    </span>
    <span class="status-photo-zoom">
      <div class="b-item-stat comment">
        <span class="ico-slider ico-slider-zoom uk-icon-justify uk-icon-comments"></span>
        <span id="num_comment_zoom">{{ count($posts->first()->comments) }}</span>
        <span class="tooltip-stat margin-num-comment-tooltip">
          <span class="text-tooltip-stat other-color">
            Количество коментариев
          </span>
          <span class="triangle-tooltip-stat"></span>
        </span>
      </div>
      <div class="b-item-stat view">
        <span class="ico-slider ico-slider-zoom uk-icon-justify uk-icon-eye"></span>
        <span id="num_views_zoom"> {{ $posts->first()->views }} </span>
        <span class="tooltip-stat other-margin-tooltip1">
          <span class="text-tooltip-stat other-color">
            Количество просмотров
          </span>
          <span class="triangle-tooltip-stat"></span>
        </span>
      </div>
    </span>
  </div>
</div>
