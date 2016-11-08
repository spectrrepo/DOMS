@extends('layouts.site')
<div class="content">
  <div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 tm-grid-heights" data-uk-grid>

    @foreach ( $newsAll as $news)
    <div class="news-item">
      <img src="{{ $news->image->url() }}" alt="" />
      <h4 class="news-title"> {{ $news->title }} </h4>
      <p class="news-text">
        {{ $news->text }}
      </p>
      <span class="news-date">{{ $news->date }}</span>
    </div>
    @endforeach
    <div class="clear"></div>
  </div>
</div>
