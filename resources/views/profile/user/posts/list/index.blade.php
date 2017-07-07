@extends('profile.layout')
@section('profile-content')
    @include('profile.elements.info_user')
    <div class="separate-title"></div>
    @include('profile.user.elements.tabs')
    <div class="wrap-personal-news uk-clearfix ">
        @if ((!empty($posts)))
            <div class="uk-clearfix b-personal-news download-user-place content  content-your-photo uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-5 tm-grid-heights" data-uk-grid>
                @foreach ($posts as $post)
                    @include('profile.user.posts.list.item', ['post' => $post])
                @endforeach
            </div>
        @else
            <div class="uk-clearfix content content-your-photo">
                <h4>Нет фотографий</h4>
            </div>
        @endif
    </div>
@endsection
