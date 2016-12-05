<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="_token" content="<?php echo csrf_token(); ?>">
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
