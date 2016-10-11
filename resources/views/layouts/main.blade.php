<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title></title>
  </head>
  <body>
    @include('../helpers.header')

    @section('common-content')
    @show

    @include('../helpers.footer')

  <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
