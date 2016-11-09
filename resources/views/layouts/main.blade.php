<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title></title>
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
