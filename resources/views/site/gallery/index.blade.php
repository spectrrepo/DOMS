@extends('site.layout')
@section('site-content')
<div class="content">
  @if (Session::get('check') == 'true')
    @include('site.elements.alert')
  @endif
  <div class="info-text-message">По вышему запросу ничего не найдено</div>
  <div id="pole" class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 tm-grid-heights" data-uk-grid>
    @foreach ( $posts as $post)
        @include('site.gallery.item',['post' => $post])
    @endforeach
  </div>
    <input type="hidden" name="lastId" value=" $imageLast->id ">
    @if ( count($posts) >= 3)
      <div class="b-next-page">
        Следущая страница
      </div>
    @endif
</div>
@endsection
