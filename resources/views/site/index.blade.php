@extends('layouts.site')
@section('site-content')
@include('popups.sidebar.sort')
<div class="content">
  <div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 tm-grid-heights" data-uk-grid>

    @foreach ( $images as $image)
        <a href="/photo/{{ $image->id }}" class="item-gallery" data-grid-prepared="true"style="position:absolute;">
          <div class="uk-panel-box" >
              <img src="{{ $image->photo->url('small') }}" >
          </div>
      </a>
    @endforeach
    <div class="clear"></div>
  </div>
  <div class="b-next-page">
    Next page
  </div>
  {!! $images->render() !!}
</div>

@endsection
