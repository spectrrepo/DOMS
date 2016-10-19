@extends('layouts.profile')
@section('profile-content')
  <h3>Избранное</h3>
  <div class="content  uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 tm-grid-heights" data-uk-grid>

    @foreach ( $images as $image)
        <a href="/photo/{{ $image->id }}" class="item-gallery" data-grid-prepared="true"style="position:absolute;">
          <div class="uk-panel-box" >
              <img src="{{ $image->photo->url('small') }}" >
          </div>
      </a>
    @endforeach
@endsection
