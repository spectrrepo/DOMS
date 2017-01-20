@extends('layouts.site')
@section('site-content')
<div class="content">
  <h3 class="liked-title">Новости</h3>
  <div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 tm-grid-heights" data-uk-grid>
    @foreach ( $news as $new )
      <div class="wrap-news-item">
        <div class="news-item">
          <img src="{{ $new->news->url() }}"/>
          <a rel="article{{$new->id}}" class="item-news-title">{{$new->title}}</a>
          <p class="item-news-text">
            {{ $new->description }}
          </p>
          <span class="item-news-date">
            {{ $new->news_updated_at->format('d M Y') }}
          </span>
        </div>
      </div>
    @endforeach
    <div class="clear"></div>
  </div>
  @foreach ( $news as $new )
  <div class="modal-news article{{$new->id}}">
    <span class="close uk-icon-justify uk-icon-remove popup-close-news"></span>
    <div class="scroll-place-modal-news">
      <img src="{{ $new->news->url() }}" />
      <span class="item-news-title">{{ $new->title }}</span>
      <div class="popup-text-news">
        {{ $new->full_description }}
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
