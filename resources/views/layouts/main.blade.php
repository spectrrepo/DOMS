<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="_token" content="{{ csrf_token() }}">
    <meta name="authID" content="{{ Auth::user()->id }}">
    <title>
      DOMS - портал идей для дизайна интерьеров
    </title>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
  </head>
  <body>
    @include('../helpers.header')

    @section('common-content')
    @show

    @include('../helpers.footer')

    @include('../popups.about')
    @include('../popups.feedback')
    @include('../popups.forgetpswd')
    @include('../popups.login')
    @include('../popups.registration')

  </body>
</html>
