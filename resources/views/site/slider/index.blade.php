@extends('layouts.site')
@section('site-content')
 <div class="content  uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 tm-grid-heights">
   @include('site.slider_components.success_alert')
   <div class="col-slider-comment">
     <div id="hide-pole-tag" class="title-tag" style="margin-bottom:10px;">
       <span class="title-slider-tag" style="float:left;">Поиск по тегам:</span>
       <div class="tag-item">Привет</div>
       <div class="clear"></div>
     </div>
     <div class="one-picture-place">
       @include('helpers.last_news')
       <div class="b-photo-slider">
         @include('popups.modal_racourse')
         @include('popups.modal_description')
         @include('popups.law')
         @include('popups.likes')
         <div class="wrap-slider">
           @foreach ($images as $image_el)
            @if ($image_el->id === $image->id)
                <div class="photo-item active-slide" data-id="{{ $image->id }}">
                    <img class="img-slider" src="{{ $image_el->photo }}" />
                </div>
            @elseif ($image_el->id < $image->id)
                <div class="photo-item left-slide" data-id="{{ $image_el->id }}">
                    <img class="img-slider" src="{{ $image_el->photo }}" />
                </div>
            @else
                <div class="photo-item right-slide" data-id="{{ $image_el->id }}">
                    <img class="img-slider" src="{{ $image_el->photo }}" />
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
          @include('site.slider_components.popup_error')
         </div>
        </div>
        <div class="b-informstion">
          <span class="b-pretens">
            <a href="/profile/{{ $user->id }}">
              <span class="author-portret">
                  <img src=" {{ $user->avatar->url('small')}}" alt="" />
              </span>
              <span class="author-name">{{ $user->name}}</span>
            </a>
            @include('site.slider_components.b_pretense')
          </span>
          <span class="num-page">
            <span id="current-position"></span>/<span id="all-photo">{{ count($images) }}</span>
          </span>
          <span class="status-photo">
             @include('site.slider_components.tooltip', ['class' => 'back-to-main','link' => 'href="/"','icon' => 'th-large','id' => ' ','data' => false,'margin' => 'margin-callback-tooltip','text' => 'Плитка','triangle'=>'triangle-callback'])
             @include('site.slider_components.tooltip', ['class' => 'full-scrn','link' => ' ','icon' => 'arrows-alt','id' => ' ','data' => false,'margin' => 'margin-full-scr-tooltip','text' => 'На весь экран','triangle'=>'triangle-full-scr'])
             @include('site.slider_components.tooltip', ['class' => 'share','link' => ' ','icon' => 'share-alt','id' => ' ','data' => false,'margin' => 'margin-share-tooltip','text' => 'Поделиться','triangle'=>' '])
             @include('site.slider_components.tooltip', ['class' => 'comment','link' => ' ','icon' => 'comments','id' => 'num_comment','data' => $num_comment,'margin' => 'margin-num-comment-tooltip','text' => 'Количество коментариев','triangle'=>' '])
             @include('site.slider_components.tooltip', ['class' => 'view','link' => ' ','icon' => 'eye','id' => 'num_views','data' => $image->views,'margin' => 'other-margin-tooltip1','text' => 'Количество просмотров','triangle'=>' '])
             @include('site.slider_components.action_tooltip', ['type' => 'liked', 'icon' => 'star', 'margin' => 'liked', 'text' => 'избранное', 'active' => 'favorite'])
             @include('site.slider_components.action_tooltip', ['type' => 'like', 'icon' => 'heart', 'margin' => 'like', 'text' => 'понравилось', 'active' => 'like'])
          </span>
        </div>
            </div>
            @include('site.slider_components.comments')
          </div>
            <div class="col-descreption-photo">
               @include('site.slider_components.tags')
              <div class="clear"></div>
               @include('site.slider_components.views')
               @include('site.slider_components.description')
            </div>
            <div class="clear"></div>
          </div>
          </div>
         @include('../popups.popup_for_slider')
@endsection
