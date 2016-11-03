<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Тестовая страница регистрации</title>
  </head>
  <body>
    <h1>Тестовая страница регистрации</h1>
    {{ Form::open(array('url' => '/reg'))}}
      <input type="text" name="name" value="">
      <input type="text" name="email" value="">
      <input type="text" name="phone" value="">
      <input type="text" name="password" value="">
      <h3>Choose your status</h3>
      <input type="radio" name="status" value="1">
      <input type="radio" name="status" value="3">
      <input type="radio" name="status" value="2">
      <input type="radio" name="status" value="6">
      <input type="submit">
    {{ Form::close()}}
    <a href="/login">Ввойти?</a>
  </body>
</html>
