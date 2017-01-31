@extends('emails.main_template')
@section('mail-text')
    <p>
        Вы зарегистрировались на сайте www. <span class="il">doms</span> .design
    </p>
    {{ $name }},<br> Благодарим Вас за регистрацию на портале
    <span class="il">Doms</span>.<br> Вы можете сейчас войти на
    <a href="http://domspectr.ru/" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=ru&amp;q=http://domspectr.ru/&amp;source=gmail&amp;ust=1479229835212000&amp;usg=AFQjCNGrF_Xd3IDGvk3c---dv-Xe9AUMZw">http://domspectr.ru/</a>
    <br>используя следующие учетные данные:<br><br> имя пользователя:
    <a href="mailto:{{ $e_mail }}" target="_blank">
        {{ $e_mail }}
    </a>
    <br> пароль: {{ $password }}
@endsection
