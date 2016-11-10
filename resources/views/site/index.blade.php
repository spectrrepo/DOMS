@extends('layouts.site')
@section('site-content')
<div class="content">
  <div id="pole" class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 tm-grid-heights" data-uk-grid>

    @foreach ( $images as $image)
        <a href="/photo/{{ $image->id }}" class="item-gallery" data-grid-prepared="true"style="position:absolute;">
          <div class="uk-panel-box" >
              <img src="{{ $image->photo->url('small') }}" >
          </div>
      </a>
    @endforeach
    <div class="clear"></div>
  </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="lastId" value="10">
    <div class="b-next-page">
      Следущая страница
    </div>
</div>

@endsection
