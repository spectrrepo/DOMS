@extends('emails.main_template')
@section('mail-text')
  <p>Ваш новый пароль на сайте www.doms.design</p>
  Для входан на сайт вы можете воспользоваться
  вашим адресом электронной почты и паролем -
  {{ $new_password }}
@endsection
