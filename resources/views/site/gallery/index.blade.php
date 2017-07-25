@extends('site.layout')
@section('site-content')
    <div class="content">
        @if (Session::get('check') == 'true')
            @include('site.elements.alert')
        @endif
        @if (isset($filter) && ($filter['tag'] !== 0) && (count($filter["tag"]) !== 0))
            <div id="hide-pole-tag" class="title-tag uk-clearfix" style="margin-bottom:10px;">
                <span class="title-slider-tag" style="float:left;">Поиск по тегам:</span>
                <div class="tag-item">{{ $filter['tag'] }}</div>
            </div>
        @endif
        @if (count($posts) === 0)
            <div class="info-text-message">По вышему запросу ничего не найдено</div>
        @endif
        <div id="pole" class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 tm-grid-heights" data-uk-grid>
            @foreach ( $posts as $post)
                @include('site.gallery.item',['post' => $post])
            @endforeach
        </div>
        @if ( count($posts) >= 3)
            <div class="b-next-page">
                Следущая страница
            </div>
        @endif
        @include('site.elements.left_sidebar.elements.popup')
    </div>
@endsection
