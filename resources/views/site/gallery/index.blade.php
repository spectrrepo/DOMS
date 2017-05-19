@extends('layouts.site')
@section('site-content')
<div class="content">
  @include('helpers.last_news')
  @if (Session::get('check') == 'true')
    @include('site.elements.alert')
  @endif
  <div class="info-text-message">По вышему запросу ничего не найдено</div>
  <div id="pole" class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 tm-grid-heights" data-uk-grid>
    @foreach ( $images as $image)
        @include('site.gallery.item',['image' => $image])
    @endforeach
  </div>
    <input type="hidden" name="lastId" value=" $imageLast->id ">
    @if ( count($images) >= 3)
      <div class="b-next-page">
        Следущая страница
      </div>
    @endif
</div>
@endsection
