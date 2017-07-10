@extends('profile.layout')
@section('profile-content')
    @include('profile.elements.info_user')
    <div class="separate-title">
        Лента
    </div>
    <div class="wrap-personal-news">
        @include('profile.user.elements.tabs')
        <div class="b-personal-news">
            @foreach($posts as $post)
                <div class="b-person-post uk-clearfix">
                    <div class="col-news-min">
                        <a href="{{ URL::route('userPage', ['id' => $post['idAuthor']]) }}" class="b-portret-blogger">
                            <img src="{{ Storage::url($post['avaAuthor']) }}"/>
                        </a>
                    </div>
                    <div class="col-news-big">
                        <div class="b-name-redactor">
                            <a href="{{ URL::route('userPage', ['id' => $post['idAuthor']]) }}">{{ $post['nameAuthor'] }}</a>
                        </div>
                        <div class="b-post-body">
                            <a href="{{ $post['id'] }}" class="b-photo-post">
                                <img src="{{ Storage::url($post['image']) }}" class="img-post" alt="" />
                            </a>
                            @include('profile.user.feed.elements.info')
                        </div>
                        @include('profile.user.feed.elements.comments')
                    </div>
                    @include('profile.user.feed.elements.likes')
                    @include('profile.user.feed.elements.favorites')
                </div>
            @endforeach
        </div>
    </div>
    <div class="btn-dwnld-new">
        Загрузить ещё
    </div>
@endsection
