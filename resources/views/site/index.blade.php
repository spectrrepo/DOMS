@extends('layouts.site')
@section('site-content')
<div class="content">
  <div id="pole" class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 tm-grid-heights" data-uk-grid>
    @foreach ( $images as $image)
        <a href="/photo/id=[{{ $image->id }}],room=[{{ $room }}],styles=[{{ $style }}],colors=[{{ $color }}],sort=[{{ $sort }}]" class="item-gallery" data-grid-prepared="true"style="position:absolute;">
          <div class="uk-panel-box" >
              <img src="{{ $image->min_path }}" >
          </div>
      </a>
    @endforeach
  </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="lastId" value="10">

    <input type="hidden" name="sortSort" value="{{ $sortSort }}">
    <input type="hidden" name="styleSort" value="{{ $styleSort }}">
    <input type="hidden" name="roomSort" value="{{ $roomSort }}">
    <input type="hidden" name="colorSort" value="{{ $colorSort }}">
    <div class="b-next-page">
      Следущая страница
    </div>
</div>

@endsection
