<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php//TODO: добавить тернарную операцию ,
    //      которая будет выбирать правильный
    //      путь для нужного роута         ?>
    <link rel="stylesheet" href="css/app.css"> 
    <title></title>
  </head>
  <body>
    @include('../helpers.header')

    @section('common-content')
    @show

    @include('../helpers.footer')

  <script type="text/javascript" src="js/app.js"></script>
  </body>
</html>
