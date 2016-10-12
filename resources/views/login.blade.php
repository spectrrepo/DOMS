<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Тестовая страница входа</title>
  </head>
  <body>
    <h1>Тестовая страница входа</h1>
    {{Form::open(array('url' => '/enter'))}}
      <input type="text" name="email" value="">
      <input type="text" name="password" value="">
      <input type="submit">
    {{Form::close()}}
    <a href="/register">Регистрация</a>
  </body>
</html>
