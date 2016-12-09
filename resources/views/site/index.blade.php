@extends('layouts.site')
@section('site-content')
<div class="content">
  <div id="pole" class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 tm-grid-heights" data-uk-grid>
    @foreach ( $images as $image)
        <a data-id="{{ $image->id }}" href="/photo/id=[{{ $image->id }}],room=[{{ $room }}],styles=[{{ $style }}],colors=[{{ $color }}],sort=[{{ $sort }}]" class="item-gallery" data-grid-prepared="true" style="position:absolute;">
          <div class="uk-panel-box" >
              <img src="{{ $image->min_path }}" >
          </div>
      </a>
    @endforeach
  </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="lastId" value="{{ $imageLast->id }}">

    <input type="hidden" name="sortSorting" value="{{ $sortSorting }}">
    <input type="hidden" name="styleSorting" value="{{ $styleSorting }}">
    <input type="hidden" name="roomSorting" value="{{ $roomSorting }}">
    <input type="hidden" name="colorSorting" value="{{ $colorSorting }}">
    <div class="b-next-page">
      Следущая страница
    </div>
</div>

@endsection
