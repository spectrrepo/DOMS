@extends('site.layout')
@section('site-content')
<div class="content">
  @if (Session::get('check') == 'true')
    @include('site.elements.alert')
  @endif
  <h3 class="liked-title">Новости</h3>
  <div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 tm-grid-heights" data-uk-grid>
    @foreach ( $articles as $article )
      @include('site.news.elements.item')
    @endforeach
    <div class="clear"></div>
  </div>
</div>
@endsection
