<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <meta name="_token" content="{{ csrf_token() }}">
        <meta name="authID" content="{{ Auth::check() ? Auth::user()->id : '' }}">
        <title>
            @if (preg_match('[/photo/]', URL::current()))
                Галерея » DOMS - портал идей для дизайна интерьеров
            @elseif (preg_match('[/add/photo]', URL::current()))
                Добавить изображение » DOMS - портал идей для дизайна интерьеров
            @elseif (preg_match('[/news]', URL::current()))
                Новости » DOMS - портал идей для дизайна интерьеров
            @elseif (preg_match('[/liked/photo]', URL::current()))
                {{ Auth::user()->name }} » Избранное » DOMS - портал идей для дизайна интерьеров
            @elseif (preg_match('[/edit/user]', URL::current()))
                {{ Auth::user()->name }} » Редактировать профиль » DOMS - портал идей для дизайна интерьеров
            @else
                DOMS - портал идей для дизайна интерьеров
            @endif
        </title>
    </head>
    <body>
        @include('common_elements.header')
        @section('common.js')
        @show

        @include('common_elements.footer')
        @include('common_elements.popups.about')
        @include('common_elements.popups.feedback')

        @if (!Auth::check())
            @include('common_elements.popups.forgetpswd')
            @include('common_elements.popups.login')
            @include('common_elements.popups.registration.index')
        @endif
        @if(isset($json))
            <script type="text/javascript">
                var __JSON_FILTER_GALLERY = JSON.parse('{{ $json }}'.replace(/&quot;/g, '"'));
            </script>
        @endif
        <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/uikit.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/grid.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
