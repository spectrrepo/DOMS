@extends('profile.layout')
@section('profile-content')
    @include('profile.elements.info_user')
    @if (Auth::user() !== null)
        <div class="separate-title">
            Лента
        </div>
        <div class="wrap-personal-news">
            <input type="hidden" id="userId" value="{{ $id }}">
            @include('profile.user.elements.tabs')
            <div class="b-personal-news">
                @foreach($posts as $post)
                    <div class="b-person-post uk-clearfix">
                        <div class="col-news-min">
                            <a href="{{ URL::route('userPage', ['id' => $post['idAuthor']]) }}" class="b-portret-blogger">
                                <img src="{{ $post['avaAuthor'] }}"/>
                            </a>
                        </div>
                        <div class="col-news-big">
                            <div class="b-name-redactor">
                                <a href="{{ URL::route('userPage', ['id' => $post['idAuthor']]) }}">{{ $post['nameAuthor'] }}</a>
                            </div>
                            <div class="b-post-body">
                                <a href='/gallery/{{ $post['id'] }}/rule={"color":0,"placements":[0],"style":[0],"tag":"0"}' class="b-photo-post">
                                    <img src="{{ $post['image'] }}" class="img-post" alt="" />
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
    @endif
@endsection
