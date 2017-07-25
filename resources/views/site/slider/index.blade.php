@extends('site.layout')
    @section('site-content')
     <div class="content  uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 tm-grid-heights">
         <div class="col-slider-comment">
             @if (isset($filter) && ($filter['tag'] !== 0))
                 <div id="hide-pole-tag" class="title-tag uk-clearfix" style="margin-bottom:10px;">
                     <span class="title-slider-tag">Поиск по тегам:</span>
                     <div class="tag-item">{{ $filter['tag'] }}</div>
                 </div>
             @endif
             <div class="one-picture-place">
                 @include('site.elements.left_sidebar.elements.popup')
                 <div class="b-photo-slider">
                 @include('site.slider.elements.popups.racourse')
                 @include('site.slider.elements.popups.description')
                 @include('site.slider.elements.popups.likes')
                 @include('common_elements.popups.pretense')
                     <div class="wrap-slider">
                         @foreach ($posts as $image_el)
                             @if ($image_el->id === $posts[0]->id)
                                 <div class="photo-item active-slide" data-id="{{ $image_el->id }}">
                                     <img class="img-slider" src="{{ Storage::url($image_el->img )}}" />
                                 </div>
                             @elseif ($image_el->id < $posts[0]->id)
                                 <div class="photo-item left-slide" data-id="{{ $image_el->id }}">
                                     <img class="img-slider" src="{{ Storage::url($image_el->img ) }}" />
                                 </div>
                             @else
                                 <div class="photo-item right-slide" data-id="{{ $image_el->id }}">
                                     <img class="img-slider" src="{{ Storage::url($image_el->img ) }}" />
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
                         @include('site.slider.elements.popups.error')
                     </div>
                 </div>
                 <div class="b-informstion">
                     <div class="b-pretens">
                         <a href="{{ route( 'userPage', ['id' => $posts->first()->user->id ])}}">
                             <div class="author-portret">
                                 <img src=" {{ Storage::url($posts->first()->user->img_mini)}}" alt="" />
                             </div>
                             <span class="author-name">{{ $posts->first()->user->name}}</span>
                         </a>
                         @if (Auth::check())
                             <div class="b-item-stat pretense-tool">
                                 <span class="b-pretense">?</span>
                                 <div class="tooltip-stat margin-full-scr-tooltip">
                                     <span class="text-tooltip-stat">
                                         Заявить права
                                     </span>
                                     <span class="triangle-tooltip-stat triangle-full-scr"></span>
                                 </div>
                             </div>
                         @endif
                     </div>
                     <div class="num-page">
                         <span id="current-position">{{ $posts->count() }}</span>/<span id="all-photo">{{ $posts->count()}}</span>
                     </div>
                     <div class="status-photo">
                         @include('site.slider.elements.center.post.elements.footer.tooltip.tooltip', ['class' => 'view','link' => ' ','icon' => 'eye','id' => 'num_views','data' => $posts->first()->views,'margin' => 'other-margin-tooltip1','text' => 'Количество просмотров','triangle'=>' '])
                         <div class="uk-button-dropdown" data-uk-dropdown="{pos:'top-center'}" aria-haspopup="true" aria-expanded="false" style="vertical-align: inherit;">
                             <div class="b-item-stat like">
                                 @if (Auth::check())
                                     <input type="hidden" name="post_id" value="{{ $posts->first()->id }}">
                                     <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                     <input type="hidden" name="url-like" value="{{ $colorLike ? '/likes/delete' : '/likes/add' }}">
                                 @endif
                                 <button class="{{ $colorLike ? 'active-like': ''}} ico-slider uk-icon-justify uk-icon-heart"></button>
                                 <span {{ Auth::check() ?  'id=num_liked' : ''}} >{{ $posts->first()->likes->count() }}</span>
                             </div>
                             <div class="uk-dropdown uk-dropdown-top uk-dropdown-small bg-none" aria-hidden="true" tabindex="">
                                 <div class="text-tooltip-stat">
                                     <span id="allLikesPost">Понравилось</span>
                                     <div id="like-whom-pole">
                                         @php $i = 0; @endphp
                                         @foreach ($posts->first()->likes as $like)
                                             @php if ($i >3) { return;} @endphp
                                             <a class="mini-avatar" href="/user/{{ $like->user_id }}" title="{{ $like->user->name }}">
                                                 <img src="{{ Storage::url($like->user->img_mini) }}">
                                             </a>
                                             @php $i++; @endphp
                                         @endforeach
                                     </div>
                                 </div>
                                 <span class="triangle-tooltip-stat"></span>
                             </div>
                         </div>
                         @include('site.slider.elements.center.post.elements.footer.tooltip.tooltip', ['class' => 'comment','link' => ' ','icon' => 'comments','id' => 'num_comment','data' => $posts->first()->comments->count(),'margin' => 'margin-num-comment-tooltip','text' => 'Количество коментариев','triangle'=>' '])
                         @include('site.slider.elements.center.post.elements.footer.tooltip.tooltip', ['class' => 'share','link' => ' ','icon' => 'share-alt','id' => ' ','data' => false,'margin' => 'margin-share-tooltip','text' => 'Поделиться','triangle'=>' '])
                         @include('site.slider.elements.center.action_tooltip', ['type' => 'liked', 'icon' => 'star', 'margin' => 'liked', 'text' => 'Избранное', 'active' => 'favorite'])
                         @include('site.slider.elements.center.post.elements.footer.tooltip.tooltip', ['class' => 'full-scrn','link' => ' ','icon' => 'arrows-alt','id' => ' ','data' => false,'margin' => 'margin-full-scr-tooltip','text' => 'На весь экран','triangle'=>'triangle-full-scr'])
                         @include('site.slider.elements.center.post.elements.footer.tooltip.tooltip', ['class' => 'back-to-main','link' => 'href='.URL::route('index'),'icon' => 'th-large','id' => ' ','data' => false,'margin' => 'margin-callback-tooltip','text' => 'Плитка','triangle'=>'triangle-callback'])
                     </div>
                 </div>
             </div>
             @include('site.slider.elements.center.comments.index')
         </div>
         <div class="col-descreption-photo">
             @include('site.slider.elements.right-sidebar.tags')
             @include('site.slider.elements.right-sidebar.racourse')
             @include('site.slider.elements.right-sidebar.description')
         </div>
     </div>
     @include('site.slider.elements.popups.slider')
    @endsection