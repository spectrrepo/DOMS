@extends('layouts.site')
@section('site-content')
<div class="content">
  @if (Session::get('check') == 'true')
    <div class="uk-alert uk-alert-success" data-uk-alert=""style="display: block;">
      <a href="" class="uk-alert-close uk-close"></a>
      <p>Пароль успешно отправлен на адрес электронной почты: {{ Auth::user()->email }}</p>
    </div>
  @endif
  <div class="info-text-message">По вышему запросу ничего не найдено</div>
  <div id="pole" class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 tm-grid-heights" data-uk-grid>
    @foreach ( $images as $image)
        <a data-id="{{ $image->id }}" href="/photo/id=[{{ $image->id }}],room=[{{ $room }}],styles=[{{ $style }}],colors=[{{ $color }}],sort=[{{ $sort }}],tag=[{{ $tag }}]" class="item-gallery" data-grid-prepared="true" style="position:absolute;">
          <div class="uk-panel-box" >
              <img src="{{ $image->min_path }}" >
          </div>
      </a>
    @endforeach
  </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="lastId" value=" $imageLast->id ">

    <input type="hidden" name="sortSorting" value="{{ $sortSorting }}">
    <input type="hidden" name="styleSorting" value="{{ $styleSorting }}">
    <input type="hidden" name="roomSorting" value="{{ $roomSorting }}">
    <input type="hidden" name="colorSorting" value="{{ $colorSorting }}">
    <input type="hidden" name="tagSorting" value="{{ $tagSorting }}">
    @if ( $images->count() >= 3)
      <div class="b-next-page">
        Следущая страница
      </div>
    @endif
</div>

@endsection
