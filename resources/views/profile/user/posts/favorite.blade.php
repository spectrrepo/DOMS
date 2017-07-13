@extends('profile.layout')
@section('profile-content')
    <h3 class=liked-title>Избранное</h3>
    <div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-5 tm-grid-heights" data-uk-grid>
        @foreach ( $images as $image)
            <a href="/photo/id=[{{ $image->post_id }}],room=[0],styles=[0],colors=[0],sort=[0]" class="item-gallery" data-grid-prepared="true"style="position:absolute;">
                <div class="uk-panel-box" >
                    <img src="{{ Storage::url($image->img_middle) }}" >
                </div>
            </a>
        @endforeach
        <div class="clear"></div>
    </div>
@endsection
